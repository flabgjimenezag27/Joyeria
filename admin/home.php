<?php
require_once('../includes/config.php');
include('../includes/adminHeader.php'); ?>


<main>
   <div class="fixedSpace"></div>


	   <div class="container">

	    <h3 class="text-center">Welcome Admin!</h3>
    <div class="admingroup">

			<p class="pl-4">JSON & XML Data Links</p>
        <ul >
            <li><a href="<?php ADMIN_URL;?>productapi.php?format=json&action=products">Lista de Productos (JSON)</a></li>
			<li ><a href="<?php ADMIN_URL;?>productapi.php?format=xml&action=products">Lista de Productos (XML)</a></li>
        </ul>

		<hr>

		<p>Lista de productos con sus categorias
		</p>
         <ul>
		 <li><a href="<?php ADMIN_URL;?>productapi.php?format=json&action=productsbycategory&category=rings">Productos de categoria Anillos (JSON)</a>
        </li>
		<li><a href="<?php ADMIN_URL;?>productapi.php?format=xml&action=productsbycategory&category=rings">Productos de categoria Anillos (XML)</a>
        </li>
		<li><a href="<?php ADMIN_URL;?>productapi.php?format=json&action=productsbycategory&category=bracelets">Productos de categoria Brazaletes (JSON)</a>
        </li>
		<li><a href="<?php ADMIN_URL;?>productapi.php?format=xml&action=productsbycategory&category=bracelets">Productos de categoria Brazaletes (XML)</a>
        </li>
		<li><a href="<?php ADMIN_URL;?>productapi.php?format=json&action=productsbycategory&category=earrings">Productos de categoria Aretes (JSON)</a>
        </li>
		<li><a href="<?php ADMIN_URL;?>productapi.php?format=xml&action=productsbycategory&category=earrings">Productos de categoria Aretes (XML)</a>
        </li>
		 </ul>
		 <hr>
		 <p>Productos dentro del rango de precios</p>
		 <ul>
		 <li><a href="<?php ADMIN_URL;?>productapi.php?format=json&action=productsbyprice&from=0&to=100">Productos entre 0 a 100 (JSON)</a></li>

		 </ul>
    </div>


	   </div>


</main>

<?php include('../includes/adminFooter.php'); ?>