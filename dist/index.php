<?php
  /* Запрос в БД */
  $dbh = new PDO('mysql:dbname=site_db;host=127.0.0.1:3306', 'root', '12345');
  $sth = $dbh->prepare("SELECT * FROM `tours` ORDER BY `id`");
  $sth->execute();
  $list = $sth->fetchAll(PDO::FETCH_ASSOC);
?> <html class="dark" lang="en">

<head>
	<meta charset="utf-8">
	<title>Подорожі</title>
	<link rel="shortcut icon" href="src/svg/Travelin.svg" />
	<script src="https://kit.fontawesome.com/268494458a.js" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:wght@100;200;300;400;500;600;700;800;900&family=STIX+Two+Text:wght@100;200;300;400;500;600;700;800;900&subset=cyrillic-ext&display=swap" rel="stylesheet" id="sf-google-fonts">
	<link href="../src/output.css" rel="stylesheet" />
</head>

<body>
	<header>
		<nav class="dark:bg-gray-800">
			<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
				<div class="relative flex h-16 items-center justify-between">
					<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
						<!-- Mobile menu button-->
						<button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
							<span onclick="toggleMenu()" class="absolute -inset-0.5"></span>
							<span class="sr-only">Open main menu</span>
							<!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
							<svg id="stickchange" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
							<!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
							<svg id="stickchangecross" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
						<div class="flex flex-shrink-0 items-center">
							<svg class="dark:fill-white h-8 w-auto" viewBox="105 0 140 158.997">
								<path d="M131.93 125.127s28.118 11.502 49.416-7.892c12.334-11.184 7.932-23.677.317-27.366 0 0 17.728-7.06 21.139 15.785 3.093 20.742-33.077 33.75-27.009 53.343 0 0-16.974-3.332-15.11-18.045-.04.04-19.632 1.586-28.754-15.825" />
								<path d="M193.918 139.92s23.796-18.838 17.371-46.917c-3.688-16.182-16.736-18.482-23.677-13.644 0 0 2.538-18.917 24.113-10.668 19.632 7.496 13.207 45.371 33.275 49.694 0 0-11.263 13.167-23.122 4.323 0 0-8.249 17.847-27.96 17.212" />
								<path d="M237.266 93.161s-4.759-29.983-32.362-38.113c-15.944-4.72-24.351 5.513-23.519 13.92 0 0-15.23-11.54 2.539-26.294 16.102-13.405 46.005 10.748 59.609-4.6 0 0 5.909 16.26-7.575 22.288 0 .04 11.501 15.944 1.308 32.8" />
								<path d="M217.793 32.481s-28.476-10.55-49.099 9.48c-11.937 11.58-7.178 23.954.555 27.364 0 0-17.49 7.615-21.614-15.11C143.827 33.552 179.56 19.393 172.858 0c0 0 17.094 2.816 15.706 17.53-.04 0 19.513-2.182 29.23 14.951" />
								<path d="M155.329 19.671s-23.162 19.632-15.825 47.473c4.244 16.063 17.371 17.966 24.114 12.89 0 0-1.944 18.997-23.796 11.461-19.83-6.821-14.675-44.934-34.822-48.583 0 0 10.788-13.485 22.963-5.077-.04 0 7.655-18.085 27.366-18.164" />
								<path d="M113.527 67.858s5.75 29.824 33.592 37.082c16.102 4.165 24.153-6.345 23.082-14.714 0 0 15.587 10.986-1.665 26.374-15.706 13.881-46.363-9.32-59.49 6.505 0 0-6.465-16.063 6.821-22.488.04-.04-11.938-15.586-2.34-32.759" />
							</svg>
						</div>
						<div class="hidden sm:ml-6 sm:block">
							<div class="flex space-x-4">
								<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
								<a href="#" class="dark:bg-gray-900 dark:text-white rounded-md px-3 py-2 text-sm font-medium bg-gray-200" aria-current="page">Головна</a>
								<a href="#" class="dark:text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Про нас</a>
							</div>
						</div>
					</div>
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
						<img class="moon cursor-pointer size-5" src="https://www.svgrepo.com/show/352289/moon.svg" alt="" />
						<img class="sun cursor-pointer size-5" src="https://www.svgrepo.com/show/18743/sun.svg" alt="" />
						<!-- Profile dropdown -->
						<div class="relative ml-3" id="DropDownButton">
							<div>
								<button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
									<span onclick="toogleDropdown()" class="absolute -inset-1.5"></span>
									<span class="sr-only">Open user menu</span> <?php if($_COOKIE["img"] != ''): ?> <img class="h-8 w-8 rounded-full" src="<?=$_COOKIE['img']?>" alt=""> <?php else:?> <img class="h-8 w-8 rounded-full" src="https://w7.pngwing.com/pngs/973/860/png-transparent-anonym-avatar-default-head-person-unknown-user-user-pictures-icon-thumbnail.png" alt=""> <?php endif;?> </button>
							</div>
							<!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
							<div id="dropdown" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md dark:bg-slate-800 dark:text-white bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
								<!-- Active: "bg-gray-100", Not Active: "" --> <?php if($_COOKIE["user"] == '1'): ?> <a href="./admin/admin.php" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-0">Адмін панель</a> <?php endif;?> <?php if($_COOKIE["img"] == ''): ?> <a onclick="authentication()" class="cursor-pointer block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">Вхід</a> <?php endif;?> <?php if($_COOKIE["img"] != ''): ?> <a href="#" class="block px-4 py-2 text-sm " role="menuitem" tabindex="-1" id="user-menu-item-2">Акаунт</a>
								<a href="php/deletecookie.php" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-2">Вийти з акаунта</a> <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile menu, show/hide based on menu state. -->
			<div class="sm:hidden" id="mobile-menu">
				<div id="dropdownsm" class="hidden space-y-1 px-2 pb-3 pt-2">
					<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
					<a href="#" class="dark:bg-gray-900 dark:text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Головна</a>
					<a href="#" class="dark:text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Про нас</a>
				</div>
			</div>
		</nav>
		<div class="h-128 rounded-3xl bg-[url('https://media.nomadicmatt.com/2022/berlinguide3.jpeg')] bg-center bg-no-repeat transition">
			<div class="h-128 bg-white/10 px-6 py-20 backdrop-blur-sm transition hover:backdrop-blur">
				<p class="mb-6 py-24 text-9xl font-black text-black"> Німеччина</p>
				<h2 class="mb-8 text-3xl text-slate-950"> Починаємо відкривати світ туристичної Німеччини</h2>
				<button type="button" class="mb-2 me-2 rounded-lg bg-gray-700 px-5 py-2.5 text-sm font-medium text-white transition hover:-translate-y-1 hover:scale-105 hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700">Хто ми такі?</button>
			</div>
		</div>
		<div class="h-10 hidden lg:block">
		</div>
		<!-- Початок карточок без інфи мале-->
		<!-- Я сам хз як-->
		<!-- Кінець карточок без інфи мале-->
		<!-- Початок карточок без інфи велике-->
		<div class="hidden lg:block">
			<div class="grid grid-cols-3 grid-rows-1 place-items-center gap-4">
				<div class="rounded-lg border-2 border-black transition hover:bg-slate-400 dark:border-white dark:bg-gray-900 dark:hover:bg-gray-700">
					<div class="mb-6 mt-6 dark:text-white">
						<div class="">
							<div class="grid grid-cols-3 grid-rows-1 place-items-center gap-4">
								<div><i class="fa-regular fa-building text-8xl"></i>
								</div>
								<div>
									<p class="text-2xl font-bold"> Зручно </p>
								</div>
								<div>
									<p class="text-sm"> Інформація оновлюється систематично </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="rounded-lg border-2 border-black transition hover:bg-slate-400 dark:border-white dark:bg-gray-900 dark:hover:bg-gray-700">
						<div class="mb-6 mt-6 dark:text-white">
							<div class="">
								<div class="grid grid-cols-3 grid-rows-1 place-items-center gap-4">
									<div>
										<i class="fa-regular fa-credit-card text-8xl"></i>
									</div>
									<div>
										<p class="text-2xl font-bold"> Вигідно </p>
									</div>
									<div>
										<p class="text-sm"> Самі вигідні пропозиції на ринку </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="rounded-lg border-2 border-black transition hover:bg-slate-400 dark:border-white dark:bg-gray-900 dark:hover:bg-gray-700">
						<div class="mb-6 mt-6 dark:text-white">
							<div class="">
								<div class="grid grid-cols-3 grid-rows-1 place-items-center gap-4">
									<div>
										<i class="fa-regular fa-user text-8xl"></i>
									</div>
									<div>
										<p class="text-2xl font-bold"> Комфортно </p>
									</div>
									<div class="">
										<p class="pl-10 text-sm"> Автомобілі найвищої якості </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Кінець карточок без інфи -->
	</header>

	<body class="bg-white dark:bg-gray-900">
		</div>
		<!-- Основна інформація -->
		<div class="flex mr-36 ml-36">
			<div class="sticky pt-6 mt-6 pb-6 border-2 border-gray-500 rounded-lg dark:text-white">
				<p class="mb-20 ml-6 font-bold text-6xl"> Відкрийте для себе Німеччину: мальовничі краєвиди, багата історія та незабутні враження! </p>
				<h2 class="mb-6 ml-6 font-semibold text-3xl"> Ласкаво просимо до Німеччини!</h2>
				<h5 class="mb-20 ml-6 text-xl"> Країна контрастів та вражаючих пейзажів, Німеччина запрошує вас у незабутню подорож. Від величних Альп до чарівних середньовічних міст, від жвавих мегаполісів до затишних сіл, Німеччина має щось для кожного.</h5>
				<h2 class="mb-6 ml-6 font-semibold text-3xl"> Чому варто відвідати Німеччину?</h2>
				<h5 class="mb-2 ml-6 text-xl"> • <b>Пізнайте багату історію</b>: Відвідайте стародавні замки, величні собори та пам'ятні місця, що нагадують про бурхливе минуле країни.</h5>
				<h5 class="mb-2 ml-6 text-xl"> • <b>Пориньте у культуру</b>: Відкрийте для себе світові музеї, опери, театри та фестивалі, що відображають різноманіття німецької культури. </h5>
				<h5 class="mb-2 ml-6 text-xl"> • <b>Спробуйте смачну їжу</b>: Насолодіться традиційними стравами, такими як пиво, ковбаси, шніцель та претцелі, а також відкрийте для себе нові кулінарні враження. </h5>
				<h5 class="mb-2 ml-6 text-xl"> • <b>Відпочиньте на природі</b>: Погуляйте мальовничими стежками, покатайтеся на велосипеді вздовж річок або покатайтеся на лижах в Альпах.</h5>
				<h5 class="mb-20 ml-6 text-xl"> • <b>Відвідайте динамічні міста</b>: Відкрийте для себе космополітичний Берлін, жвавий Мюнхен, історичний Нюрнберг та багато інших цікавих міст. </h5>
				<h2 class="mb-6 ml-6 font-semibold text-3xl"> Зручні тури для будь-якого бюджету </h2>
				<h5 class="mb-20 ml-6 text-xl"> Ми пропонуємо широкий спектр турів по Німеччині, які відповідають вашим інтересам та бюджету. Ви можете вибрати групові тури або індивідуальні подорожі, екскурсії по містах або тематичні тури, що зосереджені на певній епосі чи аспекті німецької культури.</h5>
				<h2 class="mb-6 ml-6 font-semibold text-3xl"> Зверніться до нас вже сьогодні, щоб розпочати планувати свою незабутню подорож до Німеччини!</h2>
				<h2 class="mb-6 ml-6 font-semibold text-3xl">
					<a onclick="copynumber()" class="underline underline-offset-1 cursor-pointer text-blue-500 hover:text-blue-300">Зателефонуйте</a> нам або <a onclick="copymail()" class="underline underline-offset-1 cursor-pointer text-blue-500 hover:text-blue-300">напишіть нам</a>, щоб отримати більше інформації та забронювати тур.
				</h2>
			</div>
		</div>
		<div class="px-6 py-20 grid grid-cols-3 grid-rows-1 gap-10 place-items-center"> <?php foreach ($list as $row): ?> <?php if($row['id']==1): ?> <div class="h-128 transition hover:scale-105">
				<div class=" bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
					<a href="#">
						<img class="hover:blur-sm transition rounded-t-lg w-128" src="<?php echo $row['tour_img_url']; ?>" alt="" />
					</a>
					<div class="p-5">
						<a href="#">
							<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?php echo $row['title']; ?> </h5>
						</a>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <?php echo $row['info_short']; ?> </p>
						<a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Read more </a>
					</div>
				</div>
			</div> <?php endif; ?> <?php if($row["id"] == 2): ?> <div class="h-128 transition hover:scale-105">
				<div class="bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
					<a href="#">
						<img class="hover:blur-sm transition rounded-t-lg" src="<?php echo $row['tour_img_url']; ?>" alt="" />
					</a>
					<div class="p-5">
						<a href="#">
							<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?php echo $row['title']; ?> </h5>
						</a>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <?php echo $row['info_short']; ?> </p>
						<a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Read more </a>
					</div>
				</div>
			</div> <?php endif; ?> <?php if($row["id"] == 3): ?> <div class="h-128 transition hover:scale-105">
				<div class="bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
					<a href="#">
						<img class="hover:blur-sm transition rounded-t-lg" src="<?php echo $row['tour_img_url']; ?>" alt="" />
					</a>
					<div class="p-5">
						<a href="#">
							<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?php echo $row['title']; ?> </h5>
						</a>
						<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> <?php echo $row['info_short']; ?> </p>
						<a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Read more </a>
					</div>
				</div>
			</div> <?php endif; ?> <?php endforeach; ?> </div>
		</div>
		<div id="popup-modal" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 flex h-[calc(100%-1rem)] max-h-full w-full items-end justify-end overflow-y-auto overflow-x-hidden hidden">
			<div class="relative max-h-full w-full max-w-md p-4">
				<div class="p-4 text-center md:p-5">
					<div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 transition dark:bg-red-700 dark:text-green-400" role="alert">
						<span class="font-medium">Вдалось!</span> Cкопійована
					</div>
				</div>
			</div>
		</div>

    
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" class="fixed overflow-y-auto overflow-x-hidden flex top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full hidden">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Sign in to our platform
                </h3>
                <button type="button" onclick="closemodal()" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="php/adminlog.php" method="post"> 
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                        </div>
                        <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


	</body>
	<footer class="bg-gray-100 py-4 text-black dark:bg-gray-800 dark:text-white">
		<div class="container mx-auto flex flex-wrap justify-between px-4">
			<div class="w-full md:w-1/2">
				<h3 class="mb-2 text-xl font-bold"> Подорожі по Німеччині</h3>
				<p class="text-gray-900 dark:text-gray-400"> Відкрийте для себе красу Німеччини з нашими незабутніми турами.</p>
			</div>
			<div class="mt-4 flex w-full flex-col md:mt-0 md:w-1/2">
				<h3 class="mb-2 text-xl font-bold"> Контакти</h3>
				<ul class="list-none">
					<li class="mb-2"><a onclick="copymail()" class="text-blue-500 hover:text-blue-700 cursor-pointer">info@travelgermany.com</a>
					</li>
					<li class="mb-2"><a onclick="copynumber()" class="text-blue-500 hover:text-blue-700 cursor-pointer">+380 00 000 00 00</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<script src="./app.js"></script>
	<script src="./script.js"></script>
</body>

</html>