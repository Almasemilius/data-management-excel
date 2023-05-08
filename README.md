<h1><u>SYSTEM DEVELOPMENT TASK</u></h1>
<h3> Overview </h3>
<ul>
    <li><p> The system is built using Laravel framework together with Laravel-Livewire and TailwindCss as the frontend library. </p></li>
    <li><p>The database used in the system is mysql.</p></li>
</ul>
<h3>
    How to run system locally
</h3>
<ul>
    <li>
        <p>
        In order to run this system locally, you need to have php 7 and above in your system, node installed and composer installed.
        </p>
        <p>After successifully cloning the project, duplicate the .env.example file and rename it to .env</p>
        <p>After renaming the file, fill in the details of the data base to be used for this system.</p>
        <p>After configuring the .env file, create a database in your machine having the same name as in your .env file</p>
        <p>once you have successifully set up the credentials in your env file and created a database, run composer install to install the project dependencies.</p>
        <p>Run php artisan migrate to create the tables defined in the migration files.</p>
        <p>Lastly, run the command npm run build to compile the assets in the project and php artisan serve to serve the project locally in your machine.</p>
    </li>
</ul>
<h3>
    Uploading CSV file to the system
</h3>
<ul>
    <li>
        <p>To upload a CSV file to the system, you click the top left input button to select the CSV file you want to upload then click the upload button to upload the file.
        </p>
        <p>
        The uploaded file will be processed by the system and data will be fed to the system
        </p>
    </li>
</ul>
<h4>Navigating</h4>
<ul>
    <li>
        <p>
          To search file, use the search bar located on the top of the system where you can search data by depth percent, carat weight, table_percent,meas_length,meas_width and meas_depth.
        </p>
    </li>
</ul>
<h4>Filter</h4>
<ul>
    <li>
        <p>
          You can filter using the select buttons on the right of the search bar where you can filter using symerty, cut, cut quality and polish.
        </p>
    </li>
</ul>
<h4>Sorting</h4>
<ul>
    <li>
        <p>
          You can sort the data using any column by clicking on the header of the column you want to sort data with.
        </p>
    </li>
</ul>
<h4>Downloading Excel file</h4>
<ul>
    <li>
        <p>
           To download the excel file from the system, you click the button on the top right of the system and it will process data and provide a download link.
        </p>
    </li>
</ul>
<p>
    To optimize performance, the uploading and downloading process are done using queues and jobs thus while performing these operations, you have to run the command php artisan queue:work in your terminal.
</p>
