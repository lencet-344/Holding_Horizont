<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // VISTA 1: RESUMEN FINANCIERO POR CULTIVO (UTILIDAD NETA)
        $sql_vista_1 = "
            CREATE VIEW V_ResumenFinancieroCultivo AS
            SELECT
                c.id AS crop_id,
                ty.name AS tipo_cultivo,
                f.name AS nombre_finca,
                a.name AS nombre_area,
                c.start_date,
                c.end_date,
                COALESCE(SUM(ae.amount), 0) AS gasto_agronomico,
                COALESCE(SUM(ph.cost), 0) AS costo_post_cosecha,
                COALESCE(prep.costo_preparacion, 0) AS costo_preparacion_terreno,
                p.total_revenue AS ingresos_totales,
                p.total_cost AS costo_produccion_produccion,
                (
                    p.total_revenue - 
                    (
                        p.total_cost + 
                        COALESCE(SUM(ae.amount), 0) + 
                        COALESCE(SUM(ph.cost), 0) + 
                        COALESCE(prep.costo_preparacion, 0)
                    )
                ) AS utilidad_neta
            FROM 
                crops c
            JOIN areas a ON c.area_id = a.id
            JOIN farms f ON a.farm_id = f.id
            JOIN crop_types ty ON c.crop_type_id = ty.id
            LEFT JOIN productions p ON c.id = p.crop_id
            LEFT JOIN sowings s ON c.id = s.crop_id
            LEFT JOIN agronomic_expenses ae ON s.id = ae.sowing_id
            LEFT JOIN harvests h ON c.id = h.crop_id
            LEFT JOIN post_harvests ph ON h.id = ph.harvest_id
            LEFT JOIN (SELECT area_id, SUM(cost) AS costo_preparacion FROM preparations GROUP BY area_id) prep 
            ON a.id = prep.area_id
            GROUP BY 
                c.id, ty.name, f.name, a.name, p.total_revenue, p.total_cost, prep.costo_preparacion, c.start_date, c.end_date
            ORDER BY 
                f.name, a.name, c.start_date;
        ";
        DB::statement($sql_vista_1);

        // VISTA 2: PRODUCTIVIDAD DE COSECHA
        $sql_vista_2 = "
            CREATE VIEW V_ProductividadCosecha AS
            SELECT
                c.id AS crop_id,
                ty.name AS tipo_cultivo,
                f.name AS nombre_finca,
                a.name AS nombre_area,
                a.size AS area_sembrada,
                c.start_date AS fecha_inicio_cultivo,
                h.harvest_date AS fecha_cosecha,
                DATEDIFF(h.harvest_date, c.start_date) AS duracion_dias, 
                h.quantity AS cantidad_cosechada,
                h.unit_of_measure AS unidad_de_medida,
                (h.quantity / a.size) AS rendimiento_por_area
            FROM
                crops c
            JOIN crop_types ty ON c.crop_type_id = ty.id
            JOIN areas a ON c.area_id = a.id
            JOIN farms f ON a.farm_id = f.id
            JOIN harvests h ON c.id = h.crop_id
            WHERE h.quantity IS NOT NULL
            ORDER BY f.name, rendimiento_por_area DESC;
        ";
        DB::statement($sql_vista_2);
        
        // VISTA 3: HORAS Y TAREAS DE EMPLEADOS
        $sql_vista_3 = "
            CREATE VIEW V_HorasTareasEmpleados AS
            SELECT
                e.id AS employee_id,
                e.name AS nombre_empleado,
                e.role AS rol_empleado,
                f.name AS nombre_finca,
                j.description AS descripcion_tarea,
                j.start_date AS fecha_inicio,
                j.end_date AS fecha_fin,
                DATEDIFF(j.end_date, j.start_date) AS duracion_dias
            FROM 
                employees e
            JOIN 
                jobs j ON e.id = j.employee_id
            LEFT JOIN 
                owners o ON e.owner_id = o.id
            LEFT JOIN 
                farms f ON o.id = f.owner_id
            WHERE
                j.end_date IS NOT NULL
            ORDER BY
                e.name, j.start_date DESC;
        ";
        DB::statement($sql_vista_3);

        // VISTA 4: CLIENTES Y VENTAS
        $sql_vista_4 = "
            CREATE VIEW V_VentasClientes AS
            SELECT
                c.id AS customer_id,
                c.name AS nombre_cliente,
                c.contact_info AS info_contacto_cliente,
                COUNT(s.id) AS total_ventas_realizadas,
                SUM(s.quantity_sold) AS cantidad_total_vendida,
                SUM(s.price_per_unit * s.quantity_sold) AS ingresos_totales_por_cliente
            FROM 
                customers c
            JOIN 
                sales s ON c.id = s.customer_id
            GROUP BY
                c.id, c.name, c.contact_info
            ORDER BY
                ingresos_totales_por_cliente DESC;
        ";
        DB::statement($sql_vista_4);


        // VISTA 5: INVENTARIO DE INSUMOS
        $sql_vista_5 = "
            CREATE VIEW V_InventarioInsumos AS
            SELECT
                i.name AS nombre_insumo,
                i.activity_type AS tipo_uso,
                i.expense_type AS tipo_gasto,
                i.unit_of_measure AS unidad_medida,
                -- Suma la cantidad total comprada (asumiendo que amount es la cantidad en esta vista simplificada)
                SUM(i.amount) AS cantidad_total_comprada,
                -- Asume una tabla de uso futura o simplifica a solo lo comprado por ahora
                -- Si tuvieras una tabla de inventario, restaríamos lo usado a lo comprado. 
                -- Por ahora, esta vista muestra el total histórico adquirido.
                'Revisar uso vs. compra' AS estado_inventario
            FROM 
                agronomic_expenses i
            GROUP BY
                i.name, i.activity_type, i.expense_type, i.unit_of_measure
            ORDER BY
                cantidad_total_comprada DESC;
        ";
        DB::statement($sql_vista_5);

        // VISTA 6: CONTROL DE PLAGAS Y TRATAMIENTOS
        $sql_vista_6 = "
            CREATE VIEW V_ControlPlagas AS
            SELECT
                c.id AS crop_id,
                ty.name AS tipo_cultivo,
                f.name AS nombre_finca,
                a.name AS nombre_area,
                ae.activity_type AS problema_tratado,
                i.name AS nombre_insecticida,
                i.application_date AS fecha_aplicacion,
                i.quantity_applied AS cantidad_aplicada,
                ae.amount AS costo_gasto_total
            FROM 
                crops c
            JOIN 
                areas a ON c.area_id = a.id
            JOIN 
                farms f ON a.farm_id = f.id
            JOIN 
                crop_types ty ON c.crop_type_id = ty.id
            JOIN 
                sowings s ON c.id = s.crop_id
            JOIN 
                agronomic_expenses ae ON s.id = ae.sowing_id
            JOIN 
                insecticides i ON ae.id = i.agronomic_expense_id
            WHERE 
                ae.activity_type IN ('Fumigacion', 'Control de Plagas', 'Aplicación de Insecticida') 
            ORDER BY 
                i.application_date DESC;
        ";
        DB::statement($sql_vista_6);


        // VISTA 7: DISTRIBUCIÓN Y USO DE ÁREAS
        $sql_vista_7 = "
            CREATE VIEW V_UsoArea AS
            SELECT
                f.name AS nombre_finca,
                a.name AS nombre_area,
                a.size AS tamaño_area_ha,
                a.location AS ubicacion_area,
                ty.name AS cultivo_actual,
                c.start_date AS fecha_siembra,
                c.end_date AS fecha_fin_estimada
            FROM 
                farms f
            JOIN 
                areas a ON f.id = a.farm_id
            LEFT JOIN 
                crops c ON a.id = c.area_id
            LEFT JOIN 
                crop_types ty ON c.crop_type_id = ty.id
            -- Filtra solo los cultivos que están activos o que se sembraron recientemente (puedes ajustar esta lógica)
            WHERE 
                c.end_date IS NULL OR c.end_date >= CURDATE()
            ORDER BY 
                f.name, a.name;
        ";
        DB::statement($sql_vista_7);


        // VISTA 8: RENDIMIENTO ECONÓMICO POR PRODUCCIÓN
        $sql_vista_8 = "
            CREATE VIEW V_RendimientoEconomico AS
            SELECT
                p.id AS production_id,
                p.total_quantity AS cantidad_producida,
                p.total_cost AS costo_produccion_total,
                p.total_revenue AS ingreso_total_estimado,
                -- Calcula el Costo Unitario Real
                (p.total_cost / p.total_quantity) AS costo_unitario_real,
                -- Calcula el Precio Promedio de Venta
                (SELECT AVG(price_per_unit) FROM sales s WHERE s.production_id = p.id) AS precio_promedio_venta,
                -- Calcula el Ingreso Neto de esa producción
                (p.total_revenue - p.total_cost) AS ingreso_neto_lote
            FROM 
                productions p
            WHERE 
                p.total_quantity > 0 AND p.total_cost IS NOT NULL
            ORDER BY 
                ingreso_neto_lote DESC;
        ";
        DB::statement($sql_vista_8);
    
    
     


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // COMANDOS DROP PARA ELIMINAR LAS VISTAS
        // Comando para eliminar la Vista 1
        DB::statement("DROP VIEW IF EXISTS V_ResumenFinancieroCultivo;");
        // Comando para eliminar la Vista 2
        DB::statement("DROP VIEW IF EXISTS V_ProductividadCosecha;");
        // Comando para eliminar la Vista 3
        DB::statement("DROP VIEW IF EXISTS V_HorasTareasEmpleados;");
        // Comando para eliminar la Vista 4
        DB::statement("DROP VIEW IF EXISTS V_VentasClientes;"); 
        // Comando para eliminar la Vista 5
        DB::statement("DROP VIEW IF EXISTS V_InventarioInsumos;"); 
        // Comando para eliminar la Vista 6
        DB::statement("DROP VIEW IF EXISTS V_ControlPlagas;");
        // Comando para eliminar la Vista 7
        DB::statement("DROP VIEW IF EXISTS V_UsoArea;"); 
        // Comando para eliminar la Vista 8
        DB::statement("DROP VIEW IF EXISTS V_RendimientoEconomico;"); 























        












    }
};