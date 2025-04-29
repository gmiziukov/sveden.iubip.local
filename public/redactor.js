// document.getElementById('position()').onclick = position;
// console.log(document.getElement("pos"));
let main_item = document.getElementById("main_item");
var item = document.querySelectorAll("div");
// console.log(document.location.pathname);
if (!table_lenght){
    var table_lenght= 1; 
    console.log("table lenth defult");
    console.log(table_lenght);
}
else{
    console.log(table_lenght);
    console.log("table not defult");

}


// console.log(item);
var csrf = document.querySelector('meta[name="csrf-token"]').content;
var arr = [];
for(let i=0;i!=item.length;i++)
    if(item[i].id == "item")
        arr.push(item[i]);
        // console.log(item[i].id);
console.log(arr);
// insertBefore()
// if(document.querySelectorAll('input').id == "pos");
//     console.log(document.querySelectorAll('input'))


async  function proba(){
    // console.log(window.location.pathname);
    let data1 = class_data;
    let  JSON_form = JSON.stringify(data1);
    console.warn(JSON_form);
    console.warn(typeof(data1));
    await window.axios.post('/api/axios_page',{data:data1, path:window.location.pathname}).then(respond=>{
        console.log(respond.data);
    })
}


// for (let i=0;i<item.length;i++){
//     console.log(item[i].querySelectorAll("td");

// }
if (document.getElementById("json_data")){
    console.error(document.getElementById("json_data").value);
    var data = JSON.parse(document.getElementById("json_data").value);
}
else{
    var data = new Map();
    // for(let i =0; i!=table_lenght-1;i++){
    //     data[i] =null;
    // }
}
var look = document.getElementsByTagName('select');
console.log(data);
console.log(look);
console.log(look.length);

// let data1 = {
//     table:[
//         {"age":"dsd"}
//     ]

// }









// [  для таблиц  ]

// [[  таблицы  ]]

// [[[  для строк  ]]]

// [[[[ строки ]]]]

// [[[[[  данные строки  ]]]]]



    // data->[table->[all_row_in_table->[row->[],row->[],row->[]]],table->[all_row_in_table->[row->[]],all_row_in_table->[row->[]]]
    






var colect_table = []
for(let i=1; i!= table_lenght;i++){
    let tab = document.getElementById("table_"+i);
    console.log(tab);
    colect_table.push(tab);
}
var class_data = new Object()
for (let i=1; i!=colect_table.length+1;i++){
    class_data[i] = []; // tables

}
console.log(class_data);
console.log(colect_table);
for (let j = 0; j < look.length; j++) {
    look[j].addEventListener('change', function() {

        let table_count = look[j].name.split("_")[0];
        let tr_count = look[j].name.split("_")[1];

        console.log(look[j]);
        console.log(table_count);
        console.log(tr_count);

        let name_table_full = look[j].parentNode.getElementsByTagName("input")[0].name;
        let name_table = name_table_full.substr(0, name_table_full.length - 2);
        let value_select = look[j].value;
        let value_input = look[j].parentNode.getElementsByTagName("input")[0].value;
        let tableIndex = parseInt(table_count.split("=")[1]);
        let rowIndex = parseInt(tr_count.split("=")[1]);

        if (!class_data[tableIndex]) {
            class_data[tableIndex] = []; 
        }

        let rowData = {};
        rowData[name_table] = {
            type: value_select,
            value: value_input
        };

        if (class_data[tableIndex][rowIndex]) {
            class_data[tableIndex][rowIndex] = { ...class_data[tableIndex][rowIndex], ...rowData };
        } else {
            class_data[tableIndex][rowIndex] = rowData;
        }

        class_data[tableIndex] = class_data[tableIndex].filter(item => item !== null);

        console.log(class_data[tableIndex]);
        console.log(class_data);
        proba();
    });
}
// data[i] += [[look[j].parentNode.querySelector("input").name.slice(0,-2) , look[j].parentNode.parentNode.children[0].value],look[j].value];





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


function add_row(pos){
    if (document.querySelectorAll("form") && document.getElementById(pos)){
        var elem = document.getElementById(pos);
        let table = (elem.querySelector("table"));
        table = (table.querySelector("tbody"));
        // let tr = ;
        var tr_clone = table.querySelector("tr").cloneNode(true);
        console.log(tr_clone.children);
        let tr_children = tr_clone.childNodes;
        for(let inp of tr_clone.children){
            if(inp.localName == "input"){
                inp.value = table.children.length+1;
                break;
            }
        }
        // console.log(tr_clone.cells);
        for(let a of tr_clone.cells){
            if (a.querySelector("input") == null){
                
            }
            else{
                a.querySelector("input").value = "";
            }
        }
        table.append(tr_clone);
        console.log(table);
        // console.log(tr);
    }
    console.log(elem);

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
        forma.action = '/sort';
        forma.method = "post";
        forma.appendChild(document.createTextNode("enter text:"));

        let csrf_input = forma.appendChild(document.createElement("input"));
        csrf_input.type = "hidden";
        csrf_input.name = "_token";
        csrf_input.value = csrf;

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
        submit_button.name = "but";
        submit_button.value = 3;
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
        forma.action = "/sort";
        forma.enctype="multipart/form-data";
        forma.method = "post";
        forma.appendChild(document.createTextNode("enter text or name:"));

        let csrf_input = forma.appendChild(document.createElement("input"));
        csrf_input.type = "hidden";
        csrf_input.name = "_token";
        csrf_input.value = csrf;

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
        input1.name = "path";

        let input2 = forma.appendChild(document.createElement('input'));
        input2.type = "file";
        input2.name = "path";

        let submit_button = forma.appendChild(document.createElement('button'));
        submit_button.textContent = "create";
        submit_button.type = "submit";
        submit_button.name = "but";
        submit_button.value = 3;
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
        forma_table_space.action = "/sort";
        forma_table_space.method = "post";

        let csrf_input = forma_table_space.appendChild(document.createElement("input"));
        csrf_input.type = "hidden";
        csrf_input.name = "_token";
        csrf_input.value = csrf;

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
        table_name.name = "table_name";
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
        submit_button.name = "but";
        submit_button.value = 3;

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