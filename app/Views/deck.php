<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/styles/tailwind.css'); ?>">
    <title> Deck </title>
    <style>
    #dropdown-content {
        margin-top: 20px;
        display: none;
    }

    #blah {
        max-height: 400px;
    }

    .pagination li {
        padding: 10px 20px;
        border: solid 1px white;
    }
    </style>
</head>

<body class="bg-primary">
    <header class="bg-third bg-opacity-75 w-full h-16 py-4 flex justify-between pr-64">
        <div class="left ml-2">
            <button id="hamburgermenu" onclick="navclick()" class="px-2 py-1 text-white mr-4 mx-4">Menu
            </button>
        </div>
        <div class="right">
            <span>
                <button id="dropdown" onclick="dropdownclick()" class='text-white mx-2 text-sm px-2 py-1 relative'>
                    Settings </span>
            </button>
            <div id="dropdown-content">
                <p>Hello World ! </p>
            </div>
        </div>
    </header>
    <div class="flex">
        <aside id="aside" style="min-height: 100vh; display:none; width:0px;">
            <div class="menu-item">Home </div>
            <div class="menu-item">
                Stories </div>
            <div class="menu-item">
                Quizzes </div>
            <div class="menu-item">
                Profile
            </div>
            <div class="menu-item">
                Settings
            </div>
            <div class="text-white font-light text-xs w-full flex justify-evenly"
                style="padding-top:1rem; padding-bottom:1rem;">
                <a class="hover:font-bold" href="">
                    Help
                </a>
                <a class="hover:font-bold" href="">Term
                </a>
                <a class="hover:font-bold" href="">Privacy
                </a>
            </div>
        </aside>
        <section class='pl-16 pt-8 w-full pr-64'>
            <div class="flex pb-4 text-2xl justify-between text-white">
                <div class=" leftheader">
                    Add
                    New
                    Deck
                </div>
            </div>
            <div class="w-2/3">
                <label class="block">
                    <span class="text-white">
                        Deck
                        Name
                    </span>
                    <input name="name" class="form-input mt-1 block w-full" placeholder="Raider waite Smith">
                </label>
                <div class="h-4">
                </div>
                <label class="block">
                    <span class="text-white">
                        Deck
                        Type
                    </span>
                    <input name="type" class="form-input mt-1 block w-full" placeholder="Tarot, Oracle, Others">
                </label>
                <label class="block">
                    <span class="text-white">
                        Number
                        of
                        Cards
                    </span>
                    <input type="number" name="number" class="form-input mt-1 block w-full" placeholder="0" min="1"
                        max="4000">
                </label>
                <div class="h-4">
                </div>
                <input type='file' onchange="readURL(this);" accept="image/*" />
                <div class="h-4">
                </div>
                <img id="blah" src="http://placehold.it/180" alt="your image" />
                <div class="h-4">
                </div>
                <button class="bg-secondary px-4 py-2 rounded-md text-white" onclick="submitdata()">
                    Save
                </button>
            </div>
        </section>
    </div>
</body>
<script>
function submitdata() {
    axios.post("<?php echo base_url('decks'); ?>", {
        name: document.querySelector('[name="name"]').value,
        num_of_cards: document.querySelector('[name="number"]').value,
        type: document.querySelector('[name="type"]').value
    }).then(function(response) {
        alert(response);
    });
}

function navclick() {
    var width = document.getElementById("aside").offsetWidth;
    if (width == 0) {
        document.getElementById("aside").style.display = "block";
        document.getElementById("aside").style.width = "200px";
        document.getElementsByTagName("section").style.marginLeft = "200px";
    } else {}
    document.getElementById("aside").style.width = "0";
    document.getElementById("aside").style.display = "none";
}

function dropdownclick() {
    if (document.getElementById("dropdown-content").style.display == "block") {
        var display = document.getElementById("dropdown-content").style.display = "none";
    } else {
        var display = document.getElementById("dropdown-content").style.display = "block";
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new
        FileReader();
        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</html>