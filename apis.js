// const prof_name=prof_name;
const color=["#9dd800"];

window.onload = function() {
  if (window.location.href=='http://localhost/DailUP/DB_conn.php') create();
  if (window.location.href=='http://localhost/DailUP/view-profile.html') viewpro();
    
};

const create = () => {
  const parentDiv = document.querySelector('#main_card_info');
  parentDiv.innerHTML="";
  document.querySelector('.HEADING').innerHTML=`<h1>CATAGORIES</h1>`;
  const keys = Object.keys(prof_name);
    for (let i = 0; i < keys.length; i++) {
      newDiv = document.createElement("div");
      newDiv.className = "main_cards_cata inner_card_txt" 
      newDiv.id = keys[i]
      newDiv.style.backgroundColor=color[parseInt(Math.random()*100)%color.length];
      newDiv.innerText=keys[i];
      newDiv.onclick=(event)=>{
        profile(event.target.id)
      };
      // parentDiv.innerHTML+= `<div style="background-color:${color[parseInt(Math.random()*100)%color.length]};" id=${keys[i]} class="main_cards_cata inner_card_txt" onclick='profile(event.target.firstChild)' >${keys[i]}</div>`;
      parentDiv.appendChild(newDiv); 
    }
}



const profile = (id) =>{
  const parentDiv = document.querySelector('#main_card_info');
  document.querySelector('.HEADING').innerHTML=`<h1>${id.toUpperCase()}</h1>`;
  parentDiv.innerHTML="";
  let nm=prof_name[id];
  for (let i = 0; i < nm.length/2; i++) {
    //parentDiv.innerHTML+= `<div style="background-color:${color[parseInt(Math.random()*100)%color.length]};" id="$}" class=""  >${nm[i][1]}</div>`; 
    newDiv = document.createElement("div");
    newDiv.className = "main_cards_cata inner_card_txt" 
    newDiv.id = nm[i][0]
    newDiv.style.backgroundColor=color[parseInt(Math.random()*100)%color.length];
    newDiv.innerText=nm[i][1];
    newDiv.onclick=(event)=>{
      localStorage.setItem('info',JSON.stringify(all_info[event.target.id]));
      window.location.href="http://localhost/DailUP/view-profile.html";
    };
    parentDiv.appendChild(newDiv); 
  }
}

const viewpro = () =>{
  console.log("aaya");
  const infos=localStorage.getItem('info');
  const data=JSON.parse(infos);
  console.log(data);
  document.querySelector('#name').innerHTML=data[0]
}
