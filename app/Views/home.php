<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/styles/tailwind.css');?>">
    <title>Home</title>
    <style>
    #dropdown-content {
        margin-top: 20px;
        display: none;
    }

    .pagination {
        /* display: flex; */
    }

    .pagination li {
        padding: 10px 20px;
        border: solid 1px white;
    }
    </style>
</head>

<body class="bg-primary">
    <header class="bg-third bg-opacity-75 w-full h-16 py-4 flex justify-between pr-64">
        <div class="left ml-2"><button id="hamburgermenu" onclick="navclick()"
                class="px-2 py-1 text-white mr-4 mx-4">Menu</button></div>
        <div class="right"><span><button id="dropdown" onclick="dropdownclick()"
                    class='text-white mx-2 text-sm px-2 py-1 relative'>Settings
            </span></button>
            <div id="dropdown-content">
                <p>Hello World !</p>
            </div>
        </div>
    </header>
    <div class="flex">
        <aside id="aside" style="min-height: 100vh; display:none; width:0px;">
            <div class="menu-item">Home</div>
            <div class="menu-item">Stories</div>
            <div class="menu-item">Quizzes</div>
            <div class="menu-item">Profile</div>
            <div class="menu-item">Settings</div>
            <div class="text-white font-light text-xs w-full flex justify-evenly"
                style="padding-top:1rem; padding-bottom:1rem;"><a class="hover:font-bold" href="">Help </a><a
                    class="hover:font-bold" href="">Term </a><a class="hover:font-bold" href="">Privacy </a></div>
        </aside>
        <section class='pl-16 pt-8 w-full pr-64'>
            <div class="flex justify-between">
                <div class="text-xl text-white w-2/5"> Cards Admin</div>
                <div class="text-white w-3/5 flex justify-between">
                    <div class="header text-xl">Total Decks
                        <div class="info text-6xl"> 300</div>
                    </div>
                    <div class="header text-xl">Total Cards
                        <div class="info text-6xl"> 4000</div>
                    </div>
                    <div class="header text-xl">New Members
                        <div class="info text-6xl"> 1</div>
                    </div>
                </div>
            </div>

            <div class="w-2/3">
                <div class="flex pb-4 text-2xl justify-between text-white">
                    <div class=" leftheader">Deck Table</div>
                    <div class=" rightheade border border-white px-2">
                        <button>Add New</button>
                    </div>
                </div>
                <table class="card-table w-full text-white text-center">
                    <thead class="bg-brown-3">
                        <tr>
                            <th class="p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox text-red-200">
                                    <div class="ml-2">Name</div>
                                </div>
                            </th>
                            <th class='p-4'>
                                Number of Cards
                            </th>
                            <th class='p-4'>
                                Latest Update
                            </th>
                            <th class='p-4'>
                                Actions
                            </th>
                        </tr>
                        <tr style="height:8px;">
                        </tr>
                    </thead>
                    <tbody class="bg-brown-3 mt-2">
                        <tr>
                            <td class='p-4'>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox text-red-200">
                                    <div class="ml-2">White Light Oracle</div>
                                </div>
                            </td>
                            <td class='p-4'>
                                44
                            </td>
                            <td class='p-4'>
                                2018-09-10
                            </td>
                            <td class="p-4">
                                <button class="bg-red-600 p-2 rounded-md"> Delete </button>
                                <button class="bg-orange-900 p-2 rounded-md"> Edit </button>
                            </td>
                        </tr>
                        <tr>
                            <td class='p-4'>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox text-red-200">
                                    <div class="ml-2">White Light Oracle</div>
                                </div>
                            </td>
                            <td class='p-4'>
                                44
                            </td>
                            <td class='p-4'>
                                2018-09-10
                            </td>
                            <td class="p-4">
                                <button class="bg-red-600 p-2 rounded-md"> Delete </button>
                                <button class="bg-orange-900 p-2 rounded-md"> Edit </button>
                            </td>
                        </tr>
                        <tr>
                            <td class='p-4'>
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox text-red-200">
                                    <div class="ml-2">White Light Oracle</div>
                                </div>
                            </td>
                            <td class='p-4'>
                                44
                            </td>
                            <td class='p-4'>
                                2018-09-10
                            </td>
                            <td class="p-4">
                                <button class="bg-red-600 p-2 rounded-md"> Delete </button>
                                <button class="bg-orange-900 p-2 rounded-md"> Edit </button>
                            </td>
                        </tr>
                    </tbody>
                    <tfooter>
                        <tr style="height:30px;"></tr>
                        <tr>
                            <td colspan="6" class="">
                                <ul class="pagination flex">
                                    <!-- <ul class="pagination justify-center flex bg-red-500"> -->
                                    <li>Prev</li>
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>

                                    <li>Next</li>
                                </ul>
                            </td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </section>
    </div>
</body>
<script>
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
</script>

</html>