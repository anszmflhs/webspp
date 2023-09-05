const navigation = document.querySelector('.navigation');
const logo = document.querySelector('.logo');
const logotitle = document.querySelector('.logo_title');
const toggleclose = document.querySelector('.uil-multiply');
const toggleopen = document.querySelector('.uil-bars');
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('section a').
forEach(link => {
    if(link.href.includes('${activePage}')){
        link.classList.add('active');
    console.log(link);
    }
})

document.querySelector('.toggle').onclick = function(){
    this.classList.toggle('active');
    navigation.classList.toggle('active');
    logo.classList.toggle('active');
    logotitle.classList.toggle('active');
    toggleclose.classList.toggle('active');
    toggleopen.classList.toggle('active');
}


