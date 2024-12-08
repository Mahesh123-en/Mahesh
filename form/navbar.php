<?php
require 'db_config.php';
?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home</a>
        <div class="navbar-nav">
            <a class="nav-link" href="add.php">Add New</a>
            <!-- <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search by name or email" />
                <button id="searchBtn">Search</button>
            </div> -->
            <div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by name or email" />
    <button id="searchBtn">Search</button>
</div>

            <div >
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</div>
</div>
        <!-- <div>  
        <div class="navbar-nav"> 
               <ul class="navbar-nav">
                 <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Action</a>
                        <ul class="dropdown-menu" aria-labelledby="log">
                            <li><a class="dropdown-item" href="#">login</a></li>
                            <li><a class="dropdown-item" href="#">logout</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                 </li>
               </ul>
        </div> -->
    </nav>
    
