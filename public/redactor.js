// document.getElementById('position()').onclick = position;
// console.log(document.getElement("pos"));
let main_item = document.getElementById("main_item");
var item = document.querySelectorAll("div");
// console.log(item);
var arr = [];
for(var i=0;i!=item.length;i++)
    if(item[i].id == "item")
        arr.push(item[i]);
        // console.log(item[i].id);
console.log(arr);
// insertBefore()
// if(document.querySelectorAll('input').id == "pos");
//     console.log(document.querySelectorAll('input'))
function position_up(pos){
    // console.log(pos);
    // console.log(main_item.children[1].length);
    let position;    
    for(var i = 0;i < main_item.children.length;i++){
        console.log(main_item.children[i].children[0].value);
        if (main_item.children[i].children[0].value == pos){
            position = i;
            console.log("position = "+position);
            console.log(main_item.children[i].children[1].value);
            if (main_item.children[i].children[1].value > 0 && main_item.children[i].children[1].value <= main_item.children[i].children.length){
                main_item.children[position].children[1].value = parseInt(main_item.children[position].children[1].value) -1;
                main_item.children[parseInt(position)-1].children[1].value = parseInt(main_item.children[parseInt(position)-1].children[1].value) +1;
                main_item.insertBefore(main_item.children[position], main_item.children[position-1]);
            }
            break;
        }
    }
}
function position_down(pos){
    let position;    
    for(var i = 0;i < main_item.children.length;i++){
        console.log(main_item.children[i].children[0].value);
        if (main_item.children[i].children[0].value == pos){
            position = i;
            console.log("position = "+position);
            console.log(main_item.children[i].children[1].value);
            if (main_item.children[i].children[1].value >= 0 && main_item.children[i].children[1].value <= main_item.children[i].children.length){
                main_item.children[parseInt(position)+1].children[1].value = parseInt(main_item.children[parseInt(position)+1].children[1].value) -1;
                main_item.children[position].children[1].value = parseInt(main_item.children[position].children[1].value) +1;
                main_item.insertBefore(main_item.children[position+1], main_item.children[position]);
            }
            break;
        }
    }
}