## Patients Management System (PMS)

The **Patients Management System (PMS)** is a comprehensive tool designed to manage various aspects of patient information and healthcare operations. Built using the **Filament** framework, this system streamlines healthcare workflows by providing robust features for managing patients, appointments, billing, and medical records.

### Features

- **Patient Records Management**: Store, update, and organize patient information efficiently.
- **Appointment Scheduling**: Manage patient appointments, doctor schedules, and automated reminders.
- **Billing and Payments**: Generate invoices, track payments, and manage patient billing records.
- **Medical History Tracking**: Keep track of patients' diagnoses, treatments, prescriptions, and medical records.

### Installation Instructions

To get started with the **Patients Management System (PMS)**, follow these steps:

1. **Clone the Repository**:
    ```bash
        git clone https://github.com/mahmouddev/PMS.git
        cd PMS
    ```
2. **Install Dependencies: Make sure you have Composer installed, then run**:

    ```bash
        composer install
    ```
3. ***Set Up the Environment: Copy the .env.example file to create your environment configuration***:

    ```bash
        cp .env.example .env
    ```
then Update the .env file with your database and other relevant configurations.
    
4. ***Generate Application Key: Run the following command to generate the application key***:

    ```bash
        php artisan key:generate
    ```

5. ***Run Database Migrations: Set up the database by running migrations***:

    ```bash
    php artisan migrate
    ```

6. ***Seed the Database (Optional): If needed, seed the database with sample data***:

    ```bash
        php artisan db:seed
    ```

7. ***Serve the Application: Run the local development server***:

    ```bash
        php artisan serve
    ```

Visit the application at http://localhost:8000.

8. ***Access Filament Admin Panel: After installation, you can access the Filament admin panel by visiting***:

    ```bash
        http://localhost:8000/admin
    ```