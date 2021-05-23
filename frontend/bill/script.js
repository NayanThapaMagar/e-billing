let i=1;
let number_of_rows = 1;
const table = document.querySelector("table");
const options = Array.from(document.getElementById("1").options);
    const optionsTag = options.reduce(
      (option, elem) =>
        option +
        `<option value="${elem.value}" data-select2-id="${elem.text}">${elem.text}</option>`,
    ''
    );
const addField = () => {
    ++number_of_rows;
    i=number_of_rows;
    const row = document.createElement("tr");
    row.innerHTML = `<td class="sn">
    <span style="width:100%">${number_of_rows}</span>
    <!-- sn -->
    </td>
  
    <td>
      <!-- product_id        -->
      <select
        class="select2"
        id="${number_of_rows}"
        style="width: 100%"
        onchange="productid(this.value,this.id)">
        ${optionsTag}
      </select>
    </td>
  
    <td>
      <!-- product_name -->
      <span
        class=""
        id="name${number_of_rows}"
        data-placeholder="Select a Product"
        style="width: 100%"
        onchange="product(this.value)">
      </span>
    </td>
  
    <td>
      <!-- rate -->
      <span id="rate${number_of_rows}" style="width: 100%"></span>
    </td>
  
    <td style="width: 200px" >
      <!-- qty -->
      <input
      style="width:90%; height:90%"
        type="text"
        id="qty-${number_of_rows}"
        style="width: 100%"
        oninput="quantity(this.id)"
      />
    </td>
  
    <td>
      <!-- qty*rate -->
      <span
        id="amount${number_of_rows}"
        style="width: 100%"
        onchange="total(this.value)">
      </span>
    </td>`;
    // console.log(i);     
    // console.log(j);
    // getSearchField();
    // calculateTotal();
table.appendChild(row);
  };

// const getSearchField = id => {
//     $(`#${id}`).select2();
// }
// table.addEventListener('click', (event) => {
// if(parseInt(event.target.id))
//     $(`#${event.target.id}`).select2();
// })

// if(i==j+1){
//   $(document).ready(
//     function () {
//         $(`#${i}`).select2();
//     }
// );
// j++;
// console.log(i);     
// console.log(j);
// }

// $(document).ready(
    // (() =>{
    //     $(`.select2`).select2();
    // })()
// );

// function getSearchField(){
//         $(document).ready(
//         function () {
//             $(`#${i}`).select2();
//         }
//     );
// }

// $(document).ready(
//     function () {
//         $(`#${i}`).select2();
//     }
// );




  function productid(data,id) {
    if (data==""){
        document.getElementById(id).innerHTML="";
        return;                               
    }
    document.getElementById(`amount${id}`).innerHTML = 0;
    document.getElementById(`qty-${id}`).value = 0;
    document.getElementById('total').innerText = `Total: ${0}`;
    document.getElementById('gTotal').innerText = `Grand Total: ${0}`;
    document.getElementById('pAmount').value = 0;
    document.getElementById('dAmount').innerText = `Due Amount: ${0}`; 
    const ajaxreq0 = new XMLHttpRequest();
    ajaxreq0.open('GET','http://127.0.0.1/frontend/bill/prdtid.php?prdtid='+data,'TRUE');
    ajaxreq0.send();  

    ajaxreq0.onreadystatechange = function () {
        if (ajaxreq0.readyState == 4 && ajaxreq0.status == 200) {
            document.getElementById(`name${id}`).innerHTML = ajaxreq0.responseText;
        }                                                                          
    } 

    const ajaxreq1 = new XMLHttpRequest();
    ajaxreq1.open('GET','http://127.0.0.1/frontend/bill/prdtid0.php?prdtid0='+data,'TRUE');
    ajaxreq1.send();  

    ajaxreq1.onreadystatechange = function () {
        if (ajaxreq1.readyState == 4 && ajaxreq1.status == 200) {
            document.getElementById(`rate${id}`).innerHTML = ajaxreq1.responseText;
        }                                                                          
    } 
}




function quantity(param) {
    const id = param.split("-")[1];
    const x = parseFloat(document.getElementById(`qty-${id}`).value);
    const y = parseFloat(document.getElementById(`rate${id}`).innerText);

    const z = x * y;
    document.getElementById(`amount${id}`).innerHTML = z; 
    calculateTotal();
    document.getElementById('pAmount').value = 0;
    document.getElementById('dAmount').innerText = `Due Amount: ${0}`; 
}    
let gTotal=0;
function calculateTotal() {
    let sum=vatAmount=discAmount=0;
for(j=1;j<=i;j++){
    const s=parseFloat(document.getElementById(`amount${j}`).innerText);
    sum=sum+s;
}
document.getElementById('total').innerText = `Total: ${sum}`;
vatAmount=(13/100)*sum;
sum=sum+vatAmount;
discAmount=(5/100)*sum;
gTotal=sum-discAmount;
document.getElementById('gTotal').innerText = `Grand Total: ${gTotal}`;
}

function PAmount() {
    let dAmount=pAmount=0;
    pAmount=parseFloat(document.getElementById('pAmount').value);
    dAmount = gTotal-pAmount;
    document.getElementById('dAmount').innerText = `Due Amount: ${dAmount}`;
}
function CId() {
  
}