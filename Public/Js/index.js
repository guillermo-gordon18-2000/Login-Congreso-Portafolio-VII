const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");





// show sidebar
menuBtn.addEventListener('click',()=> {
    sideMenu.style.display='block';
})


//close sidebar
closeBtn.addEventListener('click',()=> {
    sideMenu.style.display='none';
})

//changer theme
themeToggler.addEventListener('click', ()=> {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');;
})

Orders.forEach(order =>{
const tr = document.createElement('tr');

const trContent = ` 

                  <td>${order.productName}</td>
                  <td>${order.productNumber}</td>
                  <td>${order.paymentStatus}</td>
                  <td class="${order.shipping === 'None' ? 'warning':'primary'}">${order.shipping}</td>
                  <td class="${order.Status === 'A' ? 'success':'danger'}">${order.Status}</td>
                  <td class="primary">${order.Hora_E}</td>  
                  <td class="primary">${order.Hora_S}</td>    
                 
`;
tr.innerHTML= trContent;
document.querySelector('table tbody').appendChild(tr);
})

 
const progress = document.querySelector('.progress-done');

setTimeout(()=> {
progress.style.opacity =1;
progress.style.width = progress.getAttribute('data-done') + '%';

},500)


form = document.querySelector('form')
fileInp = form.querySelector('input');
 
  function fetchRequest(file, formData){
    infoText.innerText = "Scanning GR Code ...";
    fetch("http://api.qrserver.com/v1/read-qr-code/",
   {  method: 'POST' , body:formData}).then(res => res.json()).then(result => {
    result = result[0].symbol[0].data;
    infoText.innerText = result ? "Upload Qr Code to scan " : "Could scan qr code"
    if(!result) result;
    document.querySelector("textarea").innerText = result ;
    form.querySelector("img").src = URL.createObjectURL(file);
    wrapper.classList.add(active);
   }).catch(()=>{infoText.infoText = "Coul't scan Qr cOde"; });
  }

