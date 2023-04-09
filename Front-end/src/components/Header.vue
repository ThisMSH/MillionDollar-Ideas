<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '../stores/auth';
import Signin from './modal/Signin.vue';
import Signup from './modal/Signup.vue';

const authStore = useAuthStore();

onMounted(() => {
  // On page load or when changing themes, best to add inline in `head` to avoid FOUC
  if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark')
  }

  var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
  var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

  // Change the icons inside the button based on previous settings
  if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
  } else {
    themeToggleDarkIcon.classList.remove('hidden');
  }

  var themeToggleBtn = document.getElementById('theme-toggle');

  themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
      if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      }

    // if NOT set via local storage previously
    } else {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
      }
    }
  });
});
</script>

<template>
  <header class="fixed top-0 left-0 w-full bg-white border-gray-200 px-2 sm:px-4 py-3.5 z-50 dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="flex items-center sm:gap-x-3">
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <a href="/" class="flex items-center">
                <svg class="h-6 sm:mr-3 md:h-9" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1000 146"><g transform="matrix(1,0,0,1,-0.6060103731555841,-0.12417058497462108)"><svg viewBox="0 0 396 58" data-background-color="#ffffff" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="tight-bounds" transform="matrix(1,0,0,1,0.2399801077696111,0.04932804060635476)"><svg viewBox="0 0 395.52 57.90134391878728" height="57.90134391878728" width="395.52"><g><svg viewBox="0 0 450.74735548803335 65.98624001465537" height="57.90134391878728" width="395.52"><g><rect width="2.709638719807722" height="65.98624001465537" x="45.42442169019493" y="0" fill="#ea3c12" opacity="1" stroke-width="0" stroke="transparent" fill-opacity="1" class="rect-o-0" data-fill-palette-color="primary" rx="1%" id="o-0" data-palette-color="#ea3c12"></rect></g><g transform="matrix(1,0,0,1,55.22735548803334,0.16414487565834435)"><svg viewBox="0 0 395.52 65.65795026333868" height="65.65795026333868" width="395.52"><g><svg viewBox="0 0 395.52 65.65795026333868" height="65.65795026333868" width="395.52"><g><svg viewBox="0 0 395.52 65.65795026333868" height="65.65795026333868" width="395.52"><g transform="matrix(1,0,0,1,0,0)"><svg width="395.52" viewBox="2.369999885559082 -32.400001525878906 426.949951171875 67.80000305175781" height="65.65795026333868" data-palette-color="#ea3c12"><svg></svg><svg></svg><g class="undefined-text-0" data-fill-palette-color="primary" id="text-0"><path xmlns="http://www.w3.org/2000/svg" d="M22.09 0l-19.21-32.4h11.48l8.69 14.41 6.83-11.72v16.31zM42.26 0h-10.79v-32.4h10.79zM12.94 0h-10.08v-29.39l10.08 16.91zM47.49 0v-6.91h3.24v-18.6h-3.24v-6.89h17.28v6.89h-3.25v18.6h3.25v6.91zM80.79 0h-10.79v-32.4h10.79zM97.63 0h-15.13v-6.47h5.34v-4.1h9.79zM111.72 0h-10.79v-32.4h10.79zM128.56 0h-15.13v-6.47h5.34v-4.1h9.79zM131.37 0v-6.91h3.25v-18.6h-3.25v-6.89h17.29v6.89h-3.25v18.6h3.25v6.91zM163.94-25.83v19.24h4.05v6.59h-8.3l-6.56-6.47v-19.46l6.56-6.47h8.3v6.57zM173.83-6.59v-19.24h-4.13v-6.57h8.38l6.54 6.47v19.46l-6.54 6.47h-8.38v-6.59zM201-32.4l19.7 32.4h-11.47l-19.63-32.4zM199 0h-9.4v-29.32l9.4 15.4zM211.3-32.4h9.4v29.32l-9.4-15.47zM251.25 0h-12.33v-6.47h8v-19.46h-8v-6.47h12.33l6.49 6.47v19.46zM226.42 0v-32.4h10.79v32.4zM272.75-25.83v19.24h4.06v6.59h-8.3l-6.57-6.47v-19.46l6.57-6.47h8.3v6.57zM282.64-6.59v-19.24h-4.12v-6.57h8.37l6.54 6.47v19.46l-6.54 6.47h-8.37v-6.59zM309.2 0h-10.79v-32.4h10.79zM326.05 0h-15.14v-6.47h5.35v-4.1h9.79zM340.14 0h-10.79v-32.4h10.79zM356.98 0h-15.13v-6.47h5.34v-4.1h9.79zM382.91 0l-1.37-3.54h-10.59l2.24-6.42h5.86l-8.66-22.44h10.52l12.91 32.4zM374-18.07l-5.93 18.07h-10.43l11.57-30.93zM407.69 0h-10.79v-32.4h10.79zM417.5-25.93h-8.1v-6.47h12.33l6.49 6.47v9.72l-4.98 4.98-0.34-0.68-10.13 1.34 0.39 0.85h-3.76v-6.27h8.1zM423.24-11.23l6.08 11.23h-11.52l-4.64-9.72h8.57z" fill="#ea3c12" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal" data-fill-palette-color="primary" opacity="1"></path><path xmlns="http://www.w3.org/2000/svg" d="M2.37 35.4v-6.91h3.25v-18.6h-3.25v-6.89h17.28v6.89h-3.24v18.6h3.24v6.91zM49.71 35.4h-12.33v-6.47h8.01v-19.46h-8.01v-6.47h12.33l6.49 6.47v19.46zM24.88 35.4v-32.4h10.79v32.4zM82.28 22.09h-10.33v13.31h-10.79v-32.4h10.79v12.84h10.33zM80.37 9.28h-6.71v-6.28h16.87v9.38h-10.16zM90.53 35.4h-16.87v-6.47h6.08v-3.25h10.79zM118.33 35.4l-1.36-3.54h-10.6l2.25-6.42h5.86l-8.67-22.44h10.52l12.92 32.4zM109.42 17.33l-5.93 18.07h-10.42l11.57-30.93zM156.69 35.4h-4.35v-12.13h-14.01l-6.49-6.5v-7.3l6.49-6.47h3.66v11.5h14.89l6.28 6.5v7.93zM152.34 8.84h-8.64v-5.84h12.97l5.61 5.64v3.44h-9.94zM131.84 28.93v-3.25h10.79v3.86h8v5.86h-13.35z" fill="#ea3c12" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal" data-fill-palette-color="primary" opacity="1"></path></g></svg></g></svg></g></svg></g></svg></g><g transform="matrix(1,0,0,1,0,0.16414487565834435)"><svg viewBox="0 0 38.33112661216425 65.65795026333868" height="65.65795026333868" width="38.33112661216425"><g><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" viewBox="22.78899574279785 3.615000009536743 54.70500183105469 93.70500183105469" enable-background="new 0 0 100 100" xml:space="preserve" height="65.65795026333868" width="38.33112661216425" class="icon-icon-0" data-fill-palette-color="accent" id="icon-0"><g fill="#ea9937" data-fill-palette-color="accent"><g fill="#ea9937" data-fill-palette-color="accent"><path d="M46.396 65.289l6.033 2.288v15.185c4.472 0.104 9.672-3.744 9.672-9.152 0-4.889-3.12-7.904-15.705-13.209C31.524 53.433 24.66 46.776 24.868 35.128c0.208-12.792 9.88-22.36 21.528-23.921V3.615h6.033v7.384c8.943 0.312 22.049 4.888 22.049 16.225 0 5.513-4.369 8.425-9.465 8.425-4.576 0-8.528-3.433-8.528-8.009s3.017-6.345 3.017-7.8c0-2.08-5.824-3.017-7.072-2.809v15.185l-6.033-2.601V17.031c-3.535 0.832-6.656 4.16-6.136 8.32 0.728 5.928 7.177 9.568 11.96 11.648l8.529 3.952c10.712 4.888 16.744 11.024 16.744 23.401 0 14.664-11.648 23.713-25.064 24.44v8.528h-6.033v-8.528c-9.359-0.208-23.608-5.616-23.608-17.368 0-5.721 4.16-9.984 9.88-9.984 5.201 0 9.049 4.264 9.049 9.359 0 6.137-5.512 7.177-5.512 8.32 0 1.977 8.527 4.369 10.191 3.641V65.289z" fill="#ea9937" data-fill-palette-color="accent"></path></g></g></svg></g></svg></g></svg></g><defs></defs></svg><rect width="395.52" height="57.90134391878728" fill="none" stroke="none" visibility="hidden"></rect></g></svg></g></svg>
            </a>
        </div>
        <div class="flex lg:order-2 items-center">
            <!-- <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="lg:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Search</span>
            </button> -->
            <div v-if="authStore.user" class="relative hidden lg:block mr-2">
                <p class="text-gray-700 dark:text-gray-300 text-lg font-bold">Welcome back <span class="bg-gradient-to-tl from-red-600 to-orange-300 bg-clip-text text-transparent">{{ authStore.user.name }}</span></p>
            </div>
            <div class="relative hidden lg:block mr-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" class="search-navbar block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </div>
            <div v-if="!authStore.user" class="relative hidden lg:block">
                <button data-modal-target="signup-model" data-modal-toggle="signup-model" type="button" class="mr-2 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</button>
                <button data-modal-target="login-model" data-modal-toggle="login-model" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
            </div>
            <div v-else class="relative hidden lg:block">
                <button @click="authStore.handleLogout" type="button" class="mr-2 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Logout</button>
            </div>
            <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <button id="theme-toggle" type="button" class="ml-1 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-search">
            <div v-if="!authStore.user" class="relative mt-3 flex justify-evenly items-center lg:hidden">
                <button data-modal-target="signup-model" data-modal-toggle="signup-model" type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Sign Up</button>
                <button data-modal-target="login-model" data-modal-toggle="login-model" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Login</button>
            </div>
            <div v-else class="relative mt-3 flex justify-evenly items-center lg:hidden">
                <button @click="authStore.handleLogout" type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Logout</button>
            </div>
            <div class="relative mt-3 lg:hidden">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" class="search-navbar block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </div>
        </div>
    </div>
  </header>
  <!-- Login Modal -->
  <Signin />
  <!-- Sign Up Modal -->
  <Signup />
</template>
