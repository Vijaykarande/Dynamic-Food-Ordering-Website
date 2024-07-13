let searchForm=document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>
{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    LoginForm.classList.remove('active');
    navigation.classList.remove('active');
}

let shoppingCart=document.querySelector('.shopping-cart');
document.querySelector('#cart-btn').onclick = () =>
{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    LoginForm.classList.remove('active');
    navigation.classList.remove('active');
}

let LoginForm=document.querySelector('.login-form');
document.querySelector('#login-btn').onclick = () =>
{
    LoginForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    searchForm.classList.remove('active');
    navigation.classList.remove('active');
    
}

let navigation=document.querySelector('.navigation');
document.querySelector('#menu-btn').onclick = () =>
{
    navigation.classList.toggle('active');
    LoginForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>
{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    LoginForm.classList.remove('active');
    navigation.classList.remove('active');
    
}









