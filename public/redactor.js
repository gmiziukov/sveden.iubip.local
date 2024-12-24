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

function create_element(){
    let space = document.getElementById("create_element");
    let t = document.getElementById("type_create_element");
    function add_child(){
        let child = forma.appendChild(document.createElement("input"));
        child.className = "border-2";
    }
    function clear_element(){   
        let a = space.children.length
        for(let i =0;i<a;i++){
            // console.log(space.children[i]);
            console.log(space.removeChild(space.children[0]));
        }
    }
    function back(){
        let arr = ['text','DocOrHref','table']
        clear_element();
        console.log("back");
        let select = space.appendChild(document.createElement('select'));
        select.id = "type_create_element";
        for(let i=0;i<arr.length;i++){
            let child = select.appendChild(document.createElement("option"));
            child.textContent = arr[i];
            child.value = arr[i];
            delete child;
        }
        delete child;
        let child = space.appendChild(document.createElement('button'));
        child.textContent = "select";
        child.onclick = function(){create_element()};
        delete child;
    }

    if(t.value=="text"){
        clear_element()
        console.log(window.location.href);
        var page=window.location.pathname;
        page = page.split("/");
        page = page[page.length-1];
        let bytton_back = space.appendChild(document.createElement('button'));
        bytton_back.textContent = "back";
        bytton_back.onclick = function(){back()};
        let forma = space.appendChild(document.createElement('form'));
        forma.action = '/ddb';
        forma.appendChild(document.createTextNode("enter text:"));

        let input_page = forma.appendChild(document.createElement("input"));
        input_page.name = "page_name";
        input_page.type = "hidden";
        input_page.value = page;

        let input_type = forma.appendChild(document.createElement("input"));
        input_type.name = "input_type";
        input_type.type = "hidden";
        input_type.value = 1;
        let input = forma.appendChild(document.createElement('input'));
        input.name = "text";
        forma.appendChild(document.createTextNode("enter teg:"));
        let input1 = forma.appendChild(document.createElement('input'));
        input1.name = "teg";
        let submit_button = forma.appendChild(document.createElement('button'));
        submit_button.textContent = "create";
        submit_button.type = "submit";
    }

    if(t.value=="DocOrHref"){
        clear_element();
        console.log(window.location.href);
        var page=window.location.pathname;
        page = page.split("/");
        page = page[page.length-1];
        let bytton_back = space.appendChild(document.createElement('button'));
        bytton_back.textContent = "back";
        bytton_back.onclick = function(){back()};
        let forma = space.appendChild(document.createElement('form'));
        forma.action = "/ddb";
        forma.appendChild(document.createTextNode("enter text or name:"));
        let input_page = forma.appendChild(document.createElement("input"));
        input_page.name = "page_name";
        input_page.type = "hidden";
        input_page.value = page;
        let input_type = forma.appendChild(document.createElement("input"));
        input_type.name = "input_type";
        input_type.type = "hidden";
        input_type.value = 2;
        let input = forma.appendChild(document.createElement('input'));
        input.name = "name";
        forma.appendChild(document.createTextNode("href or fiel:"));
        let input1 = forma.appendChild(document.createElement('input'));
        input1.name = "href[]";
        let input2 = forma.appendChild(document.createElement('input'));
        input2.type = "file";
        input2.name = "href[]";
        let submit_button = forma.appendChild(document.createElement('button'));
        submit_button.textContent = "create";
        submit_button.type = "submit";
    }

    if(t.value=="table"){
        clear_element();
        console.log(window.location.href);
        var page=window.location.pathname;
        page = page.split("/");
        page = page[page.length-1];
        let bytton_back = space.appendChild(document.createElement('button'));
        bytton_back.textContent = "back";
        bytton_back.onclick = function(){back()};

        let teg_space = space.appendChild(document.createElement("div"))
        teg_space.id = "teg_space";
        
        let table_space = space.appendChild(document.createElement("div"))
        table_space.id = "table_space";

        let forma_table_space = table_space.appendChild(document.createElement("form"));
        forma_table_space.action = "/ddb";

        let input_page = forma_table_space.appendChild(document.createElement("input"));
        input_page.name = "page_name";
        input_page.type = "hidden";
        input_page.value = page;

        let input_type = forma_table_space.appendChild(document.createElement("input"));
        input_type.name = "input_type";
        input_type.type = "hidden";
        input_type.value = 3;

        forma_table_space.appendChild(document.createTextNode("input table name :"));
        
        let table_name = forma_table_space.appendChild(document.createElement("input"));
        table_name.name = "name_table";
        table_name.className = "border-2";

        let table_teg = forma_table_space.appendChild(document.createElement("input"));
        table_teg.name = "teg_table";
        table_teg.className = "border-2";

        let create_table_button = space.appendChild(document.createElement('button'));
        create_table_button.textContent = "add_column";
        create_table_button.onclick = function(){create_table()}

        let submit_button = forma_table_space.appendChild(document.createElement('button'));
        submit_button.textContent = "create";
        submit_button.type = "submit";

        async function create_table() {
            let teg = teg_space.appendChild(document.createElement("input"))
            teg.className = "border-2";
            let column = forma_table_space.appendChild(document.createElement("input"))
            column.className = "border-2";
            teg.addEventListener("input",function(){column.name = teg.value});
        }
    }



    // var forma = space.appendChild(document.createElement('form'));
    // forma.action = "*";
    // forma.className = "border-2";
    // for(var i=0; i!=3;i++){
    //     add_child();
    // }
    // console.log(space);
}