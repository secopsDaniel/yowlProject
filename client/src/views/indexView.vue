<template>
    <body class="bg-[#101A26] min-h-screen">
    <section class="bg-[#101A26] pb-40 px-4 md:px-8">
    <header class="flex mx-auto justify-between items-center max-w-[1300px] py-4 ">
            <!--logo-->
            <header class="user-nav-fixed">
        <div class="container-nav">
            <div class="header-content">
                <div class="logo">Yo<span>wl</span></div>
                <nav>
                    <ul>
                        <RouterLink to="#">
                        <li><a href="#">S'inscrire</a></li>
                        </RouterLink>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    </header>
    <section
        class="relative  flex flex-col-reverse md:flex-row mx-auto justify-between items-center gap-9 md:gap-4 max-w-[1300px] py-4  my-12">
        <svg width="736" height="423" class="absolute top-[50px] sm:top-[200px] sm:right-[-150px]" viewBox="0 0 736 423"
            fill="none">
            <path d="M738.5 4.5C491.667 -7.66666 -0.900015 58.9 3.49999 422.5" stroke="url(#paint0_linear_16_172)"
                stroke-width="6"></path>
            <defs>
                <linearGradient id="paint0_linear_16_172" x1="700.5" y1="-3.99998" x2="14.5" y2="361"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#192e5a"></stop>
                    <stop offset="0.213542" stop-color="#3b82f6"></stop>
                    <stop offset="0.71875" stop-color="#2563eb"></stop>
                    <stop offset="1" stop-color="#192e5a"></stop>
                </linearGradient>
            </defs>
        </svg><svg class="absolute sm:right-28 md:right-6" width="383" height="846" viewBox="0 0 383 846" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M3.19293 0C-0.0879101 140.127 37.2087 433.314 212.642 485.053C388.075 536.792 391.776 746.576 371.697 845"
                stroke="url(#paint0_linear_16_173)" stroke-width="6"></path>
            <defs>
                <linearGradient id="paint0_linear_16_173" x1="16.5" y1="39.5" x2="363" y2="814"
                    gradientUnits="userSpaceOnUse">
                    <stop offset="0.0104167" stop-color="#2563eb"></stop>
                    <stop offset="0.229167" stop-color="#192e5a"></stop>
                    <stop offset="0.776042" stop-color="#2563eb"></stop>
                    <stop offset="1" stop-color="#192e5a"></stop>
                </linearGradient>
            </defs>
        </svg><svg class="absolute -top-14 sm:right-7" width="416" height="675" viewBox="0 0 416 675" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M415 3C325.774 17.8434 155.913 102.224 190.271 320.998C224.63 539.772 78.4065 646.155 1 672"
                stroke="url(#paint0_linear_16_171)" stroke-width="6"></path>
            <defs>
                <linearGradient id="paint0_linear_16_171" x1="365.5" y1="28" x2="110" y2="594"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#192e5a"></stop>
                    <stop offset="0.276042" stop-color="#2563eb"></stop>
                    <stop offset="0.739583" stop-color="#3b82f6"></stop>
                    <stop offset="1" stop-color="#192e5a"></stop>
                </linearGradient>
            </defs>
        </svg>
        <div class="md:w-[520px] z-20">
            <h1 class="text-3xl md:text-[36px] lg:text-[46px] leading-[56px] text-white font-bold">
                <span class="text-[#3b82f6]">Explorez </span>le web
                et<span class="text-[#3b82f6]"> Commentez le</span></h1>
            <p class="text-base text-white mt-4 md:mt-9 mb-10 md:mb-16">Oui, sur yowl vous avez enfin une communauté avec qui partager
                vos impression sur <span class="text-[#3b82f6]">n'importe quel info </span> sur le web
            </p>
            <div class="flex gap-6 sm:gap-10">
                <RouterLink to="/home">
                <button class="uppercase font-bold text-xs rounded-[40px] py-8 lg:py-4 px-4 lg:px-9 text-white  bg-gradient-to-r from-[#2563eb] to-[#3b82f6]">COMMENCER </button>
                </RouterLink>
                <svg
                    class="w-8 h-6 sm:w-12 sm:h-9" viewBox="0 0 46 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M43.8334 19L2.16669 19M43.8334 19L27.1667 35.6667M43.8334 19L27.1667 2.33333"
                        stroke="#3b82f6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></div>
        </div>
        <div class="p-4 z-20 bg-black rounded-[100px] md:rounded-bl-[200px] lg:rounded-bl-[250px] bg-opacity-20"><img class="rounded-[200px] max-w-[490px] w-full" src="https://www.touteleurope.eu/wp-content/uploads/2025/01/reseaux-sociaux-europeens.jpg" alt="">
        </div>
    </section>
</section>
</body>
</template>
<style scoped>
.user-nav-fixed {
    position: fixed;
    top: 8px;
    right: 0;
    left: 10px; 
    height: 70px; 
    z-index: 40;
    display: flex;
    align-items: center;
    
}

.container-nav {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
    padding: 0 40px;
}



.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 70px; 
    font-weight: bold;
    color: rgb(0, 98, 255);
}

.logo span {
    color: #ffff;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 20px;
    align-items: center;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: 0.2s;
    font-size: 16px;
    background-color: rgba(0, 76, 255, 0.622);
    padding: 10px 20px;
    border-radius: 8px;
}

nav ul li a:hover {
    background-color: rgb(0, 98, 255);
    box-shadow: 0 3px 10px rgba(0, 98, 255, 0.875);
}

@media (max-width: 768px) {
.cacher {
    display: none;
}
}
</style>