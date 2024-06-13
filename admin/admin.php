<?php
  /* Запрос в БД */
  $dbh = new PDO('mysql:dbname=site_db;host=127.0.0.1:3306', 'admin', '12345');
  $sth = $dbh->prepare("SELECT * FROM `register` ORDER BY `id`");
  $sth->execute();
  $list = $sth->fetchAll(PDO::FETCH_ASSOC);

  $sthh = $dbh->prepare("SELECT * FROM `mails` ORDER BY `id`");
  $sthh->execute();
  $listh = $sthh->fetchAll(PDO::FETCH_ASSOC);

  $sthCount = $dbh->prepare("SELECT COUNT(*) FROM `mails` WHERE `is_read`=0");
  $sthCount->execute();
  $count = $sthCount->fetchColumn();
?>
<html class="dark" lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin panel</title>
	<link rel="shortcut icon" href="../src/svg/Travelin.svg" />
	<script src="https://kit.fontawesome.com/268494458a.js" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:wght@100;200;300;400;500;600;700;800;900&family=STIX+Two+Text:wght@100;200;300;400;500;600;700;800;900&subset=cyrillic-ext&display=swap" rel="stylesheet" id="sf-google-fonts">
	<link href="../../src/output.css" rel="stylesheet" />
</head>

<body>
<header>
		<nav class="dark:bg-gray-900">
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
							<a href="../index.php">
								<svg class="dark:fill-white h-8 w-auto" viewBox="105 0 140 158.997">
									<path d="M131.93 125.127s28.118 11.502 49.416-7.892c12.334-11.184 7.932-23.677.317-27.366 0 0 17.728-7.06 21.139 15.785 3.093 20.742-33.077 33.75-27.009 53.343 0 0-16.974-3.332-15.11-18.045-.04.04-19.632 1.586-28.754-15.825" />
									<path d="M193.918 139.92s23.796-18.838 17.371-46.917c-3.688-16.182-16.736-18.482-23.677-13.644 0 0 2.538-18.917 24.113-10.668 19.632 7.496 13.207 45.371 33.275 49.694 0 0-11.263 13.167-23.122 4.323 0 0-8.249 17.847-27.96 17.212" />
									<path d="M237.266 93.161s-4.759-29.983-32.362-38.113c-15.944-4.72-24.351 5.513-23.519 13.92 0 0-15.23-11.54 2.539-26.294 16.102-13.405 46.005 10.748 59.609-4.6 0 0 5.909 16.26-7.575 22.288 0 .04 11.501 15.944 1.308 32.8" />
									<path d="M217.793 32.481s-28.476-10.55-49.099 9.48c-11.937 11.58-7.178 23.954.555 27.364 0 0-17.49 7.615-21.614-15.11C143.827 33.552 179.56 19.393 172.858 0c0 0 17.094 2.816 15.706 17.53-.04 0 19.513-2.182 29.23 14.951" />
									<path d="M155.329 19.671s-23.162 19.632-15.825 47.473c4.244 16.063 17.371 17.966 24.114 12.89 0 0-1.944 18.997-23.796 11.461-19.83-6.821-14.675-44.934-34.822-48.583 0 0 10.788-13.485 22.963-5.077-.04 0 7.655-18.085 27.366-18.164" />
									<path d="M113.527 67.858s5.75 29.824 33.592 37.082c16.102 4.165 24.153-6.345 23.082-14.714 0 0 15.587 10.986-1.665 26.374-15.706 13.881-46.363-9.32-59.49 6.505 0 0-6.465-16.063 6.821-22.488.04-.04-11.938-15.586-2.34-32.759" />
								</svg>
							</a>
						</div>
						<div class="hidden sm:ml-6 sm:block">
							<div class="flex space-x-4">
								<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
								<a href="#" class="dark:bg-gray-950 dark:text-white rounded-md px-3 py-2 text-sm font-medium bg-gray-200" aria-current="page">Admin</a>
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
									<span class="sr-only">Open user menu</span><img class="h-8 w-8 rounded-full" src="<?=$_COOKIE['img']?>" alt=""></button>
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
								<!-- Active: "bg-gray-100", Not Active: "" -->
								<a href="../php/deletecookie.php" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-2">Вийти з акаунта</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile menu, show/hide based on menu state. -->
			<div class="sm:hidden" id="mobile-menu">
				<div id="dropdownsm" class="hidden space-y-1 px-2 pb-3 pt-2">
					<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
					<a href="#" class="dark:bg-gray-900 dark:text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Admin</a>
				</div>
			</div>
		</nav>
	</header>
	<body class="bg-white dark:bg-gray-800">
		<div class="flex h-full dark:text-white">
			
			<div class="grid grid-cols-2 grid-rows-2 gap-10 w-full place-items-center">
				<!-- first item	 -->
				<div class="h-full w-full">
					<h1 class="sticky text-center text-4xl text-bold mb-6">Таблиця користувача</h1>
					<div class="flex dark:border-gray-400 border-black border-4 rounded-lg">
					<table class="table-auto w-full">
                      <thead class="">
                        <tr class="dark:text-white">
                          <th> Id </th>
                          <th> Username </th>
                          <th> Email </th>
                          <th> Is_Admin </th>
                          <th> Date </th>
                        </tr>
                      </thead>
                      <tbody class="">
                      <?php foreach ($list as $row): ?>
                        <tr class="dark:text-white">
                          <td class="border-2 border-gray-400"><?php echo $row['id']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['username']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['email']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['is_admin']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['date']; ?></td>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
			</div>
			</div>
			<!-- second item -->
			<div class="flex mt-6">
			<div id="crud-modal" class="left-0 right-0 top-0h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden">
				<div class="relative max-h-full w-full max-w-md p-4">
				<!-- Modal content -->
				<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
					<!-- Modal header -->
					<div class="flex items-center justify-between rounded-t border-b p-4 md:p-5 dark:border-gray-600">
					<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Створити новий тур</h3>
					</div>
					<!-- Modal body -->
					<form class="p-4" action="../php/tour_add.php" method="post">
					<div class="mb-4 grid grid-cols-2 gap-4">
						<div class="col-span-2">
						<label for="tit" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Назва</label>
						<input type="text" name="tit" id="tit" class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Type product name" required="" />
						</div>
						<div class="col-span-2 sm:col-span-1">
						<label for="img" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Url Фото</label>
						<input type="url" name="img" id="img" class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="https://....." required="" />
						</div>
						<div class="col-span-2 sm:col-span-1">
						<label for="category" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Карточка</label>
						<select id="category" name="idd" class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400">
							<option selected="">Вибери карточку</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						</div>
						<div class="col-span-2">
						<label for="info_s" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Опис Туру</label>
						<textarea id="info_s" name="info_s" rows="4" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="Write product description here"></textarea>
						</div>
					</div>
					<button onclick="newtour()" type="submit" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						<svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
						Add new product
					</button>
					</form>
				</div>
				</div>
			</div>
			</div>

				<div class="h-full w-full">
					<!-- third item -->
					<h1 class="sticky text-center text-4xl text-bold mb-6">Вхідні</h1>
					<div class="flex dark:border-gray-400 border-black border-4 rounded-lg">
					<table class="table-auto w-full">
                      <thead>
                        <tr class="dark:text-white">
                          <th> Id </th>
                          <th> Username </th>
                          <th> Email </th>
                          <th> Text of mail </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($listh as $row): ?>
                        <tr class="dark:text-white">
                          <td class="border-2 border-gray-400"><?php echo $row['id']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['user_name']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['email_of_sender']; ?></td>
                          <td class="border-2 border-gray-400"><?php echo $row['text_of_submit']; ?></td>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
				</div>
				</div>
				<div class="flex"></div>
			</div>
			
		</div>
		<div id="popup-modal" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 flex h-[calc(100%-1rem)] max-h-full w-full items-end justify-end overflow-y-auto overflow-x-hidden hidden">
			<div class="relative max-h-full w-full max-w-md p-4">
				<div class="p-4 text-center md:p-5">
					<div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 transition dark:bg-gray-700 dark:text-green-400" role="alert">
						<span class="font-medium">Вдалось!</span> Записано
					</div>
				</div>
			</div>
		</div>	
	</body>
	<footer class="bg-gray-100 py-4 text-black dark:bg-gray-800 dark:text-white">
	</footer>
	<script src="../app.js"></script>
	<script src="../script.js"></script>
</body>
</html>