<?php
	session_start();
	$mid = $_SESSION["mid"];
	include("connMysql.php");
	if(isset($_POST['action'])){
		$name = $_POST["name"];
		$mail = $_POST["mail"];
		$phone = $_POST["phone"];
    	$sql = "UPDATE member SET name = '$name',  
            mail = '$mail', phone = '$phone' WHERE mid = $mid";
		$result = mysqli_query($db_link, $sql);
		echo("<script>alert('修改成功!');location.href='index.php'</script>");
	}
	$sql = "SELECT * FROM member Where mid = $mid";
	$result = mysqli_query($db_link, $sql);
	$row = mysqli_fetch_assoc($result);
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="icon/X.png" type="image/x-icon" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Xprice</title>
	
	<!-- Icon css link -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Extra plugin css -->
	<link href="css.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!-- font-family -->
	<script src="https://kit.fontawesome.com/04ee868bb6.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Noto+Sans+TC:wght@400;900&family=Noto+Serif+TC:wght@600&family=Oswald:wght@500&display=swap" rel="stylesheet">

</head>
<body>
	<!-- 導覽列 -->
	<header class="main_menu_area " style="background-color: #000000a1;height: 15%">
		<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
			<a class="navbar-brand" href="index.php"><img src="icon/Xprice.png" width="50%" alt=""></a>
			<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-sliders-h text-white fa-2x"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav" id='nav'>
					<li class="nav-item"><a class="nav-link" href="onsale.html">特價專區</a></li>
					<li class="nav-item"><a class="nav-link" href="map.html">搜尋店面</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- 搜尋列 -->
	<form aciton="#" method="GET">
		<div>
			<div class="col align-items-center form-inline justify-content-center background" >
				<p class="col-12 text-center text-white h1 " style="font-family: 'Noto Serif TC', serif; padding-top: 8%">最便宜、最優惠的價格都在  Xprice</p>
				<p class="col-12 text-center h3 text-white"  style="font-family: 'Oswald', sans-serif;">Give you the cheapest price</p>
				<img src="icon/Xprice.png" width="10%" style="margin-right: 2% ">
				<input type="hidden" name='store_order' value=''>
				<input type="hidden" name='data_num' value=''>
				<input type="hidden" name='price_order' value=''>
				<input type="search"  name='search' class="form-control  col-md-7"  placeholder="想找什麼?">
				<button class="btn my-2 my-sm-0 btn" type="submit" style="margin-left: 2% ; background-color:#000000a1;color: #fff">Search</button>
			</div>
		</div>
	</form>
	<form action="" method="POST" name="modify">
	<div class="container my-5" >
		<div class="row align-items-center justify-content-center rounded" >
			<div class="col-md-6 col-10 "  style="background-color: #EDEDED ;">
				<div class="col-12 justify-content-start mt-2 d-flex align-self-end">
						<i class="fas fa-pen-alt fa-4x"></i>
						<span class=" mt-4 h1 font-weight-bold " ><u>會員資料修改</u> </span>

				</div>			
				<div class="col-12 my-3">
					<label for="name" class="h5 font-weight-bold">姓名</label>
	  				<input type="name" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="姓名" value="<?php echo $row['name']?>">
  				</div>
  				<div class="col-12 my-3">
   					<label for="mail" class="h5 font-weight-bold">E-mail</label>
    				<input type="email" class="form-control" name="mail" id="mail" placeholder="Email" value="<?php echo $row['mail'] ?>">
  				</div>
  				<div class="col-12 my-3">
   					<label for="phone" class="h5 font-weight-bold">電話</label>
    				<input type="phone" class="form-control" name="phone" id="phone" placeholder="電話" value="<?php echo $row['phone'] ?>">
  				</div> 
  				<div class="button text-center mt-4" style="padding-bottom:10%">
					<!-- <button type="button" class="btn btn-light  btn-outline-secondary mx-2">註冊</button> -->
					<input type="submit" id="action" name="action" class="btn btn-light  btn-outline-secondary mx-2" value="儲存修改">
				</div>
			</div>
		</div>
	</div>
	</form>


	<footer class="bg-dark  mt-5">
		<div class="container " >
		   	<div class="row align-items-center" style="padding: 5% 0">
			 	<div class="col-3 align-self-center text-center" >
			   		<img src="icon/Xprice.png" width="70%">
			 	</div>
			 <div class="col-5 text-white" style="font-family: 'Noto Serif TC', serif;">
				 <p class="my-3 h5"> <i class="fas fa-phone"></i>      Phone：07-1234567</p>
				 <h5 class="my-3 "> <i class="fas fa-map-marker-alt"></i>         Address：高雄市鼓山區蓮海路70號</h5>
				 <h5 class="my-3 "> <i class="fas fa-building"></i>      Department：中山資訊管理學系</h5>
			 </div>
			 <div class="col-4 text-white" style="font-family: 'Noto Serif TC', serif;">
				 <a class="mx-2 " href=""><i class="fab fa-instagram fa-5x" style="color: #e54372"></i></a>
				 <a class="mx-2" href=""><i class="fab fa-facebook fa-5x" style="color: #4267b5"></i></a>
				 <a class="mx-2" href=""><i class="fab fa-twitter fa-5x" style="color: #41abe1"></i></a>
			 </div>
		   </div>
		   
		 
		</div>
			 
	 </footer>
	 <footer>
	   <div class="row align-items-center justify-content-center" style="background-color: #1a1d1f">
			 <p class="text-center text-white " >©2020 By William、Homer、James、Park Seo Jun</p>
		   </div>
	 </footer>

	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Rev slider js -->
	<!-- Extra plugin css -->
	<script src="vendors/counterup/jquery.waypoints.min.js"></script>
	<script src="vendors/counterup/jquery.counterup.min.js"></script> 
	<script src="vendors/counterup/apear.js"></script>
	<script src="vendors/counterup/countto.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
	<script src="js/smoothscroll.js"></script>
	
	<script src="js/theme.js"></script> 
</body>
</html>