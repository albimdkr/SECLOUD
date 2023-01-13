<body class="main">

<!-- prepare upload templates -->
<script id="template-upload">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="name filename"><span>{%=file.name%}</span></td>
        {% if (file.error) { %}
            <td class="error">{%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td class="progress-col">
 					<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
						<div class="bar" style="width:0%;"></div>
					</div>
            </td>
        {% } else { %}
            <td>  </td>
        {% } %}
		<td class="cancel">{% if (file.error) { %}
            <button class="btn">
                <i class="cancel"></i>
			</button>
		{% } else { %}
			<button class="btn">
                <i class="cancel"></i>
			</button>
			<span class="uploading"></span>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!--<![endif]-->



<?php if(gatorconf::get('use_auth') == true && gatorconf::get('show_top_auth_bar') == true && $_SESSION['simple_auth']['username'] != 'guest'):?>
<!-- <div class="top-menu">
<div class="row">
  
  </div>
</div>
<div class="top-menu-spacer">
  </div> -->
  <nav>
    <a href="#header" class="logo">CLOUD.</a>
    <div class="nav-username-signout">
      <?php if(gatorconf::get('allow_change_password')):?>
        <li><a class="username-edit"><?php echo $_SESSION['simple_auth']['username']?></a></li>
      <?php else:?>
        <?php echo $_SESSION['simple_auth']['username']?>
      <?php endif;?>
      <li><a href="?logout=1"><?php echo lang::get("Sign Out")?></a></li>
    </div>
    <ul>
      <li><a class="btn active" href="#logo">Generator</a></li>
      <li><a href="#anggota">Anggota</a></li>
      <li><a href="#cloud">Cloud</a></li>
    </ul>
    <label for="check" class="check">
      <input type="checkbox" id="check" class="check-nav" />
      <span></span>
      <span></span>
      <span></span>
    </label>
  </nav>
<?php endif;?>

<div id="wrapper" class="row">
<div class="container twelve columns">
<div id="content">

<?php if(gatorconf::get('use_auth') == true && gatorconf::get('show_top_auth_bar') == false && $_SESSION['simple_auth']['username'] != 'guest'):?>
<div class="small-auth-menu">
 <a class="version-info"><?php echo lang::get("FileGator")?></a>&nbsp;
 | 
 
 <?php if(gatorconf::get('allow_change_password')):?>
 	<a class="username-edit"><?php echo $_SESSION['simple_auth']['username']?></a>
 <?php else:?>
	 <?php echo $_SESSION['simple_auth']['username']?>
 <?php endif;?>
 
 | <a href="?logout=1"><?php echo lang::get("Sign out")?></a>
</div>
<?php endif;?>

<?php if(gatorconf::get('use_auth') == true && $_SESSION['simple_auth']['username'] == 'guest'):?>
<div class="small-auth-menu">
 <a href="?login=1"><?php echo lang::get("Sign in")?></a>
</div>
<?php endif;?>

<div id="logo" class="title-sistem">
  <div class="sub-title-sistem sub">
    <h2>CLOUD COMPUTING</h2>
    <h4>upload and download your files.</h4>
  </div>
  <div class="icon-title-sistem icon">
    <i class='bx bx-cloud sm-item'></i>
  </div>
</div>

<div class="fileupload-container navigation-button">
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="#" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="nav fileupload-buttonbar">
                
					
				<?php if (gator::checkPermissions('ru')):?>
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="fileinput-button nice radius button">
                    <i class="icon-plus icon-white"></i>
					
					<span class=""><?php echo lang::get("Tambah File...")?></span>

                    <input type="file" name="files[]" multiple>
                    <input type="hidden" name="uniqid" value="50338402749c1">
                </span>
                <?php endif;?>
                
                <div class="clear"></div>
                
        </div>
        
        <!-- The table listing the files available for upload/download -->
		<div id="top-panel">
        <table role="presentation" class="table table-striped">
         <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
         </tbody>
        </table>
        
        </div>
    </form>
</div>

<?php if (gator::checkPermissions('rw')):?>          
<div id="newfolder_button" class="navigation-button-right">
 <input type="text" class="inputtext" name="newfolder" id="newfolder">

 <div class="nice radius button split dropdown navigation-button-right">
  <a class="new-folder"><?php echo lang::get("New Folder")?></a>
  <span></span>
  <ul>
	<li><a class="new-folder"><?php echo lang::get("Create New Folder")?></a></li>
    <li><a class="new-file"><?php echo lang::get("Create New File")?></a></li>
  </ul>
</div>

</div>
<?php endif;?>
                
<div id="close-top-panel" class="clear">
<button type="button" class="nice radius button right upload-done"><?php echo lang::get("Done")?></button>
</div>

<div id="browse-panel">

<div class="breadcrumbs">
<span>
<?php foreach($params['breadcrumb'] as $key => $value):?>
<?php if($key != 'Home') echo '&raquo;&nbsp;'?>
<a href="<?php echo $value?>"><?php echo $key?></a>
<?php endforeach;?>
</span>
</div>

<div class="filter-field">
    <div class="row">
     <div class="twelve columns">
      <div class="row collapse">
       <div class="nine mobile-three columns">
        <input type="text">
       </div>
       <div class="three mobile-one columns">
        <span class="postfix"></span>
       </div>
      </div>
     </div>
	</div>
</div>

<a class="directory-tree"></a>
<a class="view-style" style="display:none"></a>
<a class="image-size decrease" style="display:none"></a>
<a class="image-size increase" style="display:none"></a>

<div class="clear"></div>

<form id="fileset" action="?" method="POST" accept-charset="UTF-8">

<?php gator::display("main_filelist.php", $params)?>

<div class="bottom-actions">
<?php if (gator::checkPermissions('rw')):?>
<button type="button" class="nice radius button select-button"><?php echo lang::get("Pilih Semua")?></button>

<!-- <?php if (gatorconf::get('simple_copy_move')):?>
<button type="button" class="nice secondary radius button simple-copy-selected"><?php echo lang::get("Copy")?></button>
<button type="button" class="nice secondary radius button simple-move-selected"><?php echo lang::get("Move")?></button>
<?php else:?>
<button type="button" class="nice secondary radius button cut-selected"><?php echo lang::get("Cut")?></button>
<button type="button" class="nice secondary radius button copy-selected"><?php echo lang::get("Copy")?></button>
<button type="button" class="nice secondary radius button paste-selected"<?php if (!isset($_SESSION['buffer'])) echo ' disabled="disabled"'?>"><?php echo lang::get("Paste")?></button>
<?php endif;?> -->

<?php if (gatorconf::get('use_zip')):?>
<button type="button" class="nice secondary radius button zip-selected"><?php echo lang::get("Zip")?></button>
<?php endif;?>
<button type="button" class="nice secondary radius button delete-selected"><?php echo lang::get("Hapus")?></button>

<?php endif;?>
<div class="nice radius button split dropdown right">
  <a class="sort-invert"><?php echo lang::get("Sort by")?> <?php echo lang::get(ucfirst($_SESSION['sort']['by']))?></a>
  <span></span>
  <ul>
    <li><a class="sort-by-name"><?php echo lang::get("Sort by Name")?></a></li>
    <li><a class="sort-by-date"><?php echo lang::get("Sort by Date")?></a></li>
    <li><a class="sort-by-size"><?php echo lang::get("Sort by Size")?></a></li>
  </ul>
</div>

</div>

</form>
</div> <!-- end browse-panel -->
</div>
<!-- <div id="bottomcorners"></div> -->
</div>
</div>

<div id="modal" class="reveal-modal"></div>
<div id="second_modal" class="reveal-modal"></div>
<div id="big_modal" class="reveal-modal large"></div>

<?php gator::display("main_js.php")?>


    <!-- section client -->
    <section class="container-client" id="anggota">
      <!-- new : mySwiper -->
      <div class="client mySwiper">
        <!-- new : swiper-wrapper -->
        <h2 class="title-client">ANGGOTA KELOMPOK 8</h2>
        <div class="client-content swiper-wrapper">
          <!-- new : swiper-slide -->
          <div class="slide swiper-slide">
            <img src="./include/views/img/anisa.png" alt="" class="img-client" />
            <!-- <p>very exellent, the service its so fast, fun and good for customer. You must try.</p> -->
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <div class="details">
              <span class="name">Anisa Qolbiah</span>
              <span class="job">Backend Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="./include/views/img/albi.png" alt="" class="img-client" />
            <!-- <p>very exellent, the service its so fast, fun and good for customer. You must try.</p> -->
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <div class="details">
              <span class="name">Albi Mudakar Nasyabi</span>
              <span class="job">Frontend Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="./include/views/img/dea.png" alt="" class="img-client" />
            <!-- <p>good and very fast the respon</p> -->
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <div class="details">
              <span class="name">Dea Meilani</span>
              <span class="job">Report Documentation</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="./include/views/img/adrian.png" alt="" class="img-client" />
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quas, cupiditate similique veniam quaerat incidunt doloribus! Magnam ab et labore.</p> -->
            <i class="bx bxs-quote-alt-left quote-icon"></i>
            <div class="details">
              <span class="name">Adrian Fajri</span>
              <span class="job">Research Asset</span>
            </div>
          </div>
          <!-- End slider -->
        </div>
        <!-- new : 3 -->
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- end section client -->


    <!-- Cloud -->
    <section class="container-socialmedia" id="cloud">
      <h2 class="socialmedia-title">CLOUD SERVICE PROVIDER</h2>
      <div class="social-media">
        <img src="./include/views/img/alibaba-cloud.png" alt="alibaba cloud">
      </div>
    </section>
    <!-- Cloud -->


    <footer class="container-footer" id="footer">
      <div class="footer-heading">
        <div class="item-footer">
          <h5 class="title-footer">Login</h5>
          <li><a href="#login">Generator</a></li>
          <li><a href="#login">Anggota</a></li>
          <li><a href="#tentang">Cloud Provider</a></li>
        </div>
        <div class="item-footer">
          <h5 class="title-footer">Source Code</h5>
          <div class="container-icon">
            <li>
              <a href="" target="_blank"><i class="bx bxl-dropbox footer-icon"></i></a>
            </li>
            <li>
              <a href="" target="_blank"><i class="bx bxl-github footer-icon"></i></a>
            </li>
            <li>
              <a href="" target="_blank"><i class="bx bxl-gitlab footer-icon"></i></a>
            </li>
          </div>
        </div>
        <div class="item-footer">
          <h5 class="title-footer">Kampus</h5>
          <a href="https://goo.gl/maps/tGChb5k4qodhyzSk7" target="_blank" class="alamat">Sekolah Tinggi Teknologi Bandung</a>
          <!-- <img src="./include/views/img/sttbwhite.png" alt=""> -->
        </div>
      </div>
    </footer>
    <p class="developer">MADE WITH<i class="bx bxs-heart icon-heart"></i> BY KELOMPOK 8 TIF RP 21 C</p>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#538059" fill-opacity="1" d="M0,64L40,74.7C80,85,160,107,240,106.7C320,107,400,85,480,101.3C560,117,640,171,720,186.7C800,203,880,181,960,144C1040,107,1120,53,1200,32C1280,11,1360,21,1400,26.7L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
    <!-- Javascript -->
    <script>
      // Swipper
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        // spaceBetween: 30,
        grabCursor: true,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      // Navbar mobile slider
      const menuToggle = document.querySelector(".check");
      const nav = document.querySelector("nav ul");

      menuToggle.addEventListener("click", function () {
        nav.classList.toggle("slide");
      });
    </script>