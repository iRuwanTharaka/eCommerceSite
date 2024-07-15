<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  background-color:#4b4b4b;
}

header{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 99;
  background-color: #ff4757;
}

.nav{
  max-width: 1200px;
  margin: auto;
  width: 100%;
  height: 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo{
  font-size: 1.1rem;
  font-weight: 500;
  text-decoration: none;
  text-transform: uppercase;
  color:#ffffff;
}

.box{
  color:white;
  width: 30px;
  height: 30px;
  text-align: center;
  position: relative;
}

.cart-count{
  position: absolute;
  background-color: #2f3542;
  top: -5px;
  right: 0;
  padding: 3px;
  height: 20px;
  width: 20px;
  line-height:20px ;
  border-radius: 50%;
  z-index: 99;
}

#cart-icon{
  font-size: 1.5rem;
  cursor: pointer;
  padding-top: 10px;
}

img{
  width: 100%;
}

.container{
  max-width: 1200px;
  padding: 4rem;
  margin: auto;
  width: 100%;
}

h2.title{
  font-size: 1.1rem;
  font-weight: 500;
  margin-bottom: 1.5rem;
  color:#ffffff;
}

.shop-content{
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(220px,auto));
  gap:1.5rem;
  justify-content: center;
  align-content: center;
}

.food-box{
  position: relative;
  background-color: #fff;
  padding: 10px;
  box-shadow: 0 1px 4px rgba(40, 37, 37, 0.1);
  border-radius: 3px;
}

.pic{
  overflow: hidden;
}

.pic:hover img{
transform: scale(1.5);
}

.food-img{
  transition: 0.4s;
  aspect-ratio: 1/1;
  object-fit: cover;
}

.food-title{
  font-size: 1rem;
  font-weight: 600;
  color:#ff6348;
}

.food-price{
  font-weight:500 ;
}

.add-cart{
  position: absolute;
  bottom: 0;
  right: 0;
  background-color: #2ed573;
  color:white;
  padding: 10px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: 0.5s;
}

.add-cart:hover{
  background-color:rgba(255, 0, 0, 0.786);
}
  

.cart{
  position: fixed;
  top: 0;
  right: -100%;
  width: 400px;
  height: 100vh;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 20px;
  background-color: white;
  box-shadow: 0 1px 4px rgba(40, 37, 37, 0.1);
  z-index: 100;
}

.cart-active{
  right:0;
  transition: 0.5s;
}

.cart-title{
  text-align: center;
  font-size: 1.5rem;
  font-weight: 500;
  margin-bottom: 1rem;
  padding-bottom:20px ;
  border-bottom: 1px solid rgba(0,0,0,0.1);
}

.cart-box{
  display: grid;
  grid-template-columns: 32% 50% 18%;
  align-items: center;
  gap: 1rem;
  margin-top: 1rem;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  padding-bottom: 10px;
}

.cart-img{
  width: 75px;
  height: 75px;
  object-fit: cover;
  border:2px solid  rgba(0,0,0,0.1);
  padding: 5px;
}
.detail-box{
  display: grid;
  row-gap: 0.5rem;  
}

.price-box{
  display: flex;
    justify-content: space-between; 
}

.cart-food-title{
   font-size: 1rem;
   text-transform: uppercase;
   color:#ff6348;
   font-weight: 500;
}

.cart-price{
  font-weight: 500;
}

.cart-quantity{
  border:1px solid rgba(0,0,0,0.1);
  outline:none ;
  width: 2.4rem;
  text-align: center;
  font-size: 1rem;
}

.cart-remove{
  font-size: 24px;
  color:red;
  cursor: pointer;
}

.total{
  display: flex;
  justify-content: flex-end;
  margin-top: 1.5rem;
}

.total-title{
  font-size: 1rem;
  font-weight: 600;
}

.total-price{
  margin-left: 0.5rem;
}

.btn-buy{
  padding: 12px 20px;
  background-color:#2f3542;
  color:#fff;
  border: none;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
}

#cart-close{
  position: absolute;
  top: 1rem;
  right: 0.8rem;
  font-size: 2rem;
  cursor: pointer;
}
  </style>
</head>
<body>
  <header>
    <div class="nav">

      <a href="#" class="logo">
        <ion-icon name="fast-food"></ion-icon>
        Food Delight
      </a>

      <div class="box">
        <div class="cart-count">0</div>
        <ion-icon name="cart"  id="cart-icon" ></ion-icon>
      </div>

      <div class="cart">
        <div class="cart-title">Cart Items</div>
        <div class="cart-content">
        </div>
        
      <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">Rs.0</div>
      </div>

      <button class="btn-buy">Place Order</button>

      <ion-icon name="close" id="cart-close"></ion-icon>

      </div>
    </div>
  </header>
  <div class="container">
    <h2 class="title">Discover the Best Food</h2>
    <div class="shop-content">


      <div class="food-box">
        <div class="pic">
          <img src="images/97.jpg" class="food-img">
        </div>
        <h2 class="food-title">Plain</h2>
        <span class="food-price">Rs.40</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>


      <div class="food-box">
        <div class="pic"><img src="images/98.jpg" class="food-img"></div>
        <h2 class="food-title">Paper Roast</h2>
        <span class="food-price">Rs.65</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="images/99.jpg" class="food-img"></div>
        <h2 class="food-title">Onion Roast</h2>
        <span class="food-price">Rs.80</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="images/100.jpg" class="food-img"></div>
        <h2 class="food-title">Egg Parotta</h2>
        <span class="food-price">Rs.55</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="images/101.jpg" class="food-img"></div>
        <h2 class="food-title">Plain Omelette</h2>
        <span class="food-price">Rs.25</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
      <div class="food-box">
        <div class="pic"><img src="assessment-thinking-1-of-1.jpg" class="food-img"></div>
        <h2 class="food-title">Kadai Fry</h2>
        <span class="food-price">Rs.150</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
  
      <div class="food-box">
        <div class="pic"><img src="images/103.jpg" class="food-img"></div>
        <h2 class="food-title">Egg Veechu</h2>
        <span class="food-price">Rs.65</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
  
      <div class="food-box">
        <div class="pic"><img src="images/104.jpg" class="food-img"></div>
        <h2 class="food-title">Egg Roast</h2>
        <span class="food-price">Rs.65</span>
        <ion-icon name="cart" class="add-cart"></ion-icon>
      </div>
  
    </div>
  </div>

  <script>
    const btnCart=document.querySelector('#cart-icon');
const cart=document.querySelector('.cart');
const btnClose=document.querySelector('#cart-close');

btnCart.addEventListener('click',()=>{
  cart.classList.add('cart-active');
});

btnClose.addEventListener('click',()=>{
  cart.classList.remove('cart-active');
});

document.addEventListener('DOMContentLoaded',loadFood);

function loadFood(){
  loadContent();

}

function loadContent(){
  //Remove Food Items  From Cart
  let btnRemove=document.querySelectorAll('.cart-remove');
  btnRemove.forEach((btn)=>{
    btn.addEventListener('click',removeItem);
  });

  //Product Item Change Event
  let qtyElements=document.querySelectorAll('.cart-quantity');
  qtyElements.forEach((input)=>{
    input.addEventListener('change',changeQty);
  });

  //Product Cart
  
  let cartBtns=document.querySelectorAll('.add-cart');
  cartBtns.forEach((btn)=>{
    btn.addEventListener('click',addCart);
  });

  updateTotal();
}


//Remove Item
function removeItem(){
  if(confirm('Are Your Sure to Remove')){
    let title=this.parentElement.querySelector('.cart-food-title').innerHTML;
    itemList=itemList.filter(el=>el.title!=title);
    this.parentElement.remove();
    loadContent();
  }
}

//Change Quantity
function changeQty(){
  if(isNaN(this.value) || this.value<1){
    this.value=1;
  }
  loadContent();
}

let itemList=[];

//Add Cart
function addCart(){
 let food=this.parentElement;
 let title=food.querySelector('.food-title').innerHTML;
 let price=food.querySelector('.food-price').innerHTML;
 let imgSrc=food.querySelector('.food-img').src;
 //console.log(title,price,imgSrc);
 
 let newProduct={title,price,imgSrc}

 //Check Product already Exist in Cart
 if(itemList.find((el)=>el.title==newProduct.title)){
  alert("Product Already added in Cart");
  return;
 }else{
  itemList.push(newProduct);
 }


let newProductElement= createCartProduct(title,price,imgSrc);
let element=document.createElement('div');
element.innerHTML=newProductElement;
let cartBasket=document.querySelector('.cart-content');
cartBasket.append(element);
loadContent();
}


function createCartProduct(title,price,imgSrc){

  return `
  <div class="cart-box">
  <img src="${imgSrc}" class="cart-img">
  <div class="detail-box">
    <div class="cart-food-title">${title}</div>
    <div class="price-box">
      <div class="cart-price">${price}</div>
       <div class="cart-amt">${price}</div>
   </div>
    <input type="number" value="1" class="cart-quantity">
  </div>
  <ion-icon name="trash" class="cart-remove"></ion-icon>
</div>
  `;
}

function updateTotal()
{
  const cartItems=document.querySelectorAll('.cart-box');
  const totalValue=document.querySelector('.total-price');

  let total=0;

  cartItems.forEach(product=>{
    let priceElement=product.querySelector('.cart-price');
    let price=parseFloat(priceElement.innerHTML.replace("Rs.",""));
    let qty=product.querySelector('.cart-quantity').value;
    total+=(price*qty);
    product.querySelector('.cart-amt').innerText="Rs."+(price*qty);

  });

  totalValue.innerHTML='Rs.'+total;


  // Add Product Count in Cart Icon

  const cartCount=document.querySelector('.cart-count');
  let count=itemList.length;
  cartCount.innerHTML=count;

  if(count==0){
    cartCount.style.display='none';
  }else{
    cartCount.style.display='block';
  }


}
  </script>
  <script src="js/script.js"></script>
</body>
</html>