<template>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">Yo<span>wl</span></div>
            
                <nav>
                    <ul>
                        <li><a href="#">Admin</a></li>
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