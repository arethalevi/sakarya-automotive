# Laravel E-commerce project for Sakarya Automotive 
The process in this project includes creating the database design, planning the data warehouse scheme, planning the ETL process, creating a data query that connects to dashboard visualization (the dashboard also includes drill-down details), and analyzing the information obtained from the data. 

## Setup & Installation
- Download zip atau clone : git clone https://github.com/arethalevi/sakarya-automotive
- Open the project directory
- ``` composer install ```
- ``` php artisan optimize:clear ```
- ``` php artisan key:generate ```
- ``` php artisan migrate ```
- ``` php artisan db:seed ```

## ERD Database
<img width="973" alt="Screen Shot 2023-07-03 at 20 17 21" src="https://github.com/arethalevi/sakarya-automotive/assets/72438807/7b8aac3b-d669-46b9-b603-0b1b2fd59854">

## Admin Features 
- Dashboard: The dashboard was created with Highchart.js using dummy data created using CRUD in the system and included drill-down details on the graphs 
![screencapture-127-0-0-1-8000-admin-2023-07-03-20_02_39](https://github.com/arethalevi/sakarya-automotive/assets/72438807/62c408f9-9bc7-4201-9e54-5357a78d6448)

- Manage Category of the catalog (CRUD)
- Manage Catalog (CRUD)
- Manage Production (CRUD)
- Manage Quality Control (RU)
- Manage Inventory (R)
- Manage Order & shipping (CRU)
