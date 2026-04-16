<template>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Yo<span>wl</span></div>
                <div class="relative w-full max-w-sm mx-4">
                    <input class="w-full py-2 px-4 bg-gray-100 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black" type="search" placeholder="Search">
                    <button class="absolute bg-blue-800 inset-y-0 right-0 flex items-center px-4 text-white bg-gray-700 border border-blue-500 rounded-r-md hover:bg-blue-700  focus:outline-none">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                        </svg>
                    </button>
                </div>
                <nav>
                    <ul>
                        <li>
                        <a href="#" class="lien_click">+ Commenter un lien</a>
                        </li>
                        <li><a href="#">S'inscrire</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</template>
<style scoped>
.lien_click{
    background-color: rgba(0, 76, 255, 0.622);
    box-shadow: 0 3px 10px rgba(37, 6, 83, 0.245);
 }

 .lien_click:hover{
    background-color:  rgb(0, 76, 255);
    color: rgb(250, 246, 255);
    box-shadow: 0 3px 10px rgba(0, 98, 255, 0.875);
 }

.container {
    max-width: 1500px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    background-color: #101A26;
    padding: 5px 0;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 60px;
    font-weight: bold;
    color: rgb(0, 98, 255);
}

.logo span {
    color: #ffff;
}

nav ul {
    display: flex;
    list-style: none;
    align-items: center;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: rgb(255, 255, 255);
    text-decoration: none;
    font-weight: 500;
    transition: 0.2s;
    font-size: 20px;
    background-color: rgba(0, 76, 255, 0.622);
    padding: 15px;
    border-radius: 10px;
    display: inline-block;

}

nav ul li a:hover {
    background-color: rgb(0, 98, 255);
    box-shadow: 0 3px 10px rgba(0, 98, 255, 0.875);
}

@media (max-width: 768px) {
.header-content {
        flex-direction: column;
        gap: 15px;
    }

    .logo {
        font-size: 40px;
    }

    nav ul {
        padding: 0;
    }
    
    nav ul li a {
        font-size: 15px;
        padding: 10px 15px;
    }
        }
</style>