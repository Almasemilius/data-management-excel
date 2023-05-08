<h1><u>SYSTEM DEVELOPMENT TASK</u></h1>
### Overview
##### The system is built using Laravel framework together with Laravel-Livewire and TailwindCss as the frontend library. 
#####  The database used in the system is mysql.
### How to run system locally
##### In order to run this system locally, you need to have php 7 and above in your system, node installed and composer installed.
##### After successifully cloning the project, duplicate the .env.example file and rename it to .env
##### After renaming the file, fill in the details of the data base to be used for this system.
##### After configuring the .env file, create a database in your machine having the same name as in your .env file
##### once you have successifully set up the credentials in your env file and created a database, run composer install to install the project dependencies.
##### Run php artisan migrate to create the tables defined in the migration files. 
##### Lastly, run the command npm run build to compile the assets in the project and php artisan serve to serve the project locally in your machine.
#### Uploading CSV file to the system
##### To upload a CSV file to the system, you click the top left input button to select the CSV file you want to upload then click the upload button to upload the file.
##### The uploaded file will be processed by the system and data will be fed to the system
#### Navigating 
##### To search file, use the search bar located on the top of the system where you can search data by depth percent, carat weight, table_percent,meas_length,meas_width and meas_depth.
#### Filter
##### You can filter using the select buttons on the right of the search bar where you can filter using symerty, cut, cut quality and polish.
#### Sorting
##### You can sort the data using any column by clicking on the header of the column you want to sort data with.
#### Downloading Excel file
##### To download the excel file from the system, you click the button on the top right of the system and it will process data and provide a download link.
#### To optimize performance, the uploading and downloading process are done using queues and jobs thus while performing these operations, you have to run the command php artisan queue:work in your terminal.
