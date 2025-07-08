#!/bin/bash

# Navigate to your Laravel project root
# cd /path/to/your/laravel/project

echo "Starting Laravel migrations generation..."

# Define migration names in dependency order
MIGRATIONS=(
    "create_roles_table"
    "create_users_table"
    "create_organisations_table"
    "create_departments_table"
    "create_measure_units_table"
    "create_chemical_categories_table"
    "create_hazard_statements_table"
    "create_ghs_classes_table"
    "create_funding_sources_table"
    "create_suppliers_table"
    "create_chemicals_table"
    "create_chemical_products_table"
    "create_stored_items_table"
    "create_requisitions_table"
    "create_requisition_items_table"
    "create_requisition_approvals_table"
    "create_chemical_product_ghs_classes_table"
    "create_chemical_product_hazard_statements_table"
    "create_purchase_orders_table"
    "create_purchase_order_items_table"
    "create_receipts_table"
    "create_receipt_items_table"
    "create_issues_table"
    "create_issue_items_table"
    "create_returns_table"
    "create_return_items_table"
)

# Loop through the array and generate each migration
for MIGRATION_NAME in "${MIGRATIONS[@]}"; do
    echo "Generating migration: $MIGRATION_NAME"
    php artisan make:migration "$MIGRATION_NAME"
    if [ $? -ne 0 ]; then
        echo "Error generating migration $MIGRATION_NAME. Exiting."
        exit 1
    fi
    sleep 0.1 # Small delay to ensure unique timestamps if commands run too fast
done

echo "All migration files generated successfully. Now, you need to populate each file with the schema definitions."
