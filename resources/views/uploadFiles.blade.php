<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ImgBB- Máy chủ tải ảnh</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <style>
        .logo img {
            width: 116px;
            height: 24px;
        }
        
        .content-width {
            height: 50px;
            width: 100%;
            padding: 0 10px;
        }
        
        .fa-regular {
            font-size: 1.2rem;
        }
        
        .fa-solid {
            font-size: 0.9rem;
        }
        
        * {
            /* font-family: 'Open Sans', sans-serif; */
        }
        
        .text_left {
            margin-left: 7px;
        }

        ul {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px 30px 10px 10px;
            margin-top: 10px;
            list-style: none;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        li {
            padding: 4px 0;
        }
        li:hover {
            background-color: rgb(2, 122, 242);
        }

        .hover_blue:hover {
            cursor: pointer;
            color: rgb(34, 211, 238);
        }

        .hover_blue:active {
            transition: transform 0.3s ease;
        }
        .top-left:active ul {
            display: block;
            opacity: 1;
            visibility: visible;
        }
        .show_language {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(7, auto);
            gap: 10px;
            padding: 10px;
            border-top: 1px solid #ccc;
            margin-left: 5px;

        }
        .language{
            margin-left: 10px;
        }
        .regisn{
            background-color: #2A80B9;
            padding: 4px 12px;
            margin: 0 5px 0 20px;
        }
        .Login{
            margin-left: 10px;
        }
        span{
            color: #333333;
            font-size: 17px;
        }
        .home_cover{
            width: 100%;
            height: 100vh;
        }
        h1{
            font-size: 3rem;
            justify-content: center;
            align-items: center;
        }
        p{
            font-size: 22px;
            font-weight: 100;
            margin: 20px 0;
            color: #424040;
        }
        .home_cover h1,content{
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.25);
        }
        .center-box{ 
            margin-left: auto !important;
            margin-right: auto !important;
            width: 790px;
        }
        .title{
            padding-top: 15%;
        }
        .home_buttons a{
            padding: 12px 30px;
            background-color: rgb(2 132 199);
            border-radius: 2px;

        }
      
    </style>
</head>
<body>
    <nav class="fixed top-0 left-0 w-full bg-white z-40">
        <div class="content-width border-black flex items-center justify-between">
            <div class="top-lefts flex">
                <div>
                    <span class="text-base font-normal text_left top-left hover:text-cyan-400 hover_blue text-neutral-600">
                        <i class="fa-regular fa-circle-question"></i> Giới thiệu <i class="fa-solid fa-caret-down"></i>
                    </span>
                    <ul>
                        <li><i class="fa-solid fa-code"></i> Plugin</li>
                        <li><i class="fa-solid fa-gear"></i> API</li>
                        <li><i class="fa-solid fa-building-columns"></i> Terms of service</li>
                        <li><i class="fa-solid fa-lock"></i> Privacy</li>
                        <li><i class="fa-solid fa-at"></i> Contact</li>
                    </ul>
                </div>
                <div class="language">
                    <span class="check_language hover:text-cyan-400 hover_blue"><i class="fa-solid fa-language"></i> VI <i class="fa-solid fa-caret-down"></i></span>
                    <ul class="show_language" style="display: none">
                            <li>Tiếng Việt</li>
                            <li>English</li>
                            <li>Español</li>
                            <li>Français</li>
                            <li>Deutsch</li>
                            <li>Italiano</li>
                            <li>Português</li>
                            <li>Русский</li>
                            <li>中文 (Zhōngwén)</li>
                            <li>日本語 (Nihongo)</li>
                            <li>한국어 (Hangul)</li>
                            <li>العربية (Al-‘Arabīyah)</li>
                            <li>हिन्दी (Hindi)</li>
                            <li>বাংলা (Bangla)</li>
                            <li>ไทย (Thai)</li>
                            <li>فارسی (Farsi)</li>
                            <li>Türkçe</li>
                            <li>Polski</li>
                            <li>Ελληνικά (Greek)</li>
                            <li>Nederlands</li>

                    </ul>
                </div>
            </div>
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
            </div>

            <div class="top-bar-right flex items-center h-full">
                <div class="upload">
                    <span class="text-neutral-600 pb-3 upload_img"><i class="fa-solid fa-cloud-arrow-up mr-0.5"></i> Upload</span>
                    
                </div>
                <div class="Login">
                    <span class="text-neutral-600"><i class="fa-solid fa-right-to-bracket mr-0.5"></i> Đăng nhập</span>
                </div>
                <a href="" class="regisn text-white font-bold py-1 px-2 rounded">Đăng kí</a>
            </div>
        </div>
        <hr>
    </nav>
    
    <div class="home_cover mx-auto z-20">
        <h1 class="font-bold text-center title">Đăng và chia sẻ những bức ảnh của bạn</h1>
        <p class="text-center text-2xl center-box color-[#333333] content">Drag and drop anywhere you want and start uploading your images now.
             32 MB limit. Direct image links, BBCode and HTML thumbnails.</p>
             <div class="home_buttons flex justify-center pt-2">
                <input type="file" id="fileInput" class="hidden" accept="image/*" multiple>
                <a href="#"id="uploadLink" class="text-white uppercase bg-sky-600 mx-auto start_upload">START UPLOADING</a>
            </div>
    </div>
    <div id="offcanvas" class="fixed top-[50px] left-0 w-full h-auto bg-slate-100 transform -translate-y-full transition-transform duration-300 ease-in-out z-30">
        <p class="uppercase text-slate-400 text-sm ml-1">JPG PNG BMP GIF TIF WEBP HEIC AVIF PDF 32 MB</p>

        
        <div class="contents">
            <div class="py-24">
            <div class="if_noImg" >
        <button onclick="toggleOffcanvas()" class="p-2 text-right uppercase absolute right-4 top-2 text-xs flex items-center"><i class="fa-solid fa-x pr-1" style="font-size:8px"></i> Đóng</button>
                <div class="bodys flex justify-center items-center">
                    <a href=""><i class="fa-solid fa-cloud-arrow-up text-sky-600 text-[120px]" style="font-size: 120px"></i></a>

                </div>
                <div class="footer flex justify-center items-center">
                    <a href="" class="text-2xl color-[#333333]">Kéo thả hoặc paste (Ctrl + V) ảnh vào đây để upload</a>
            </div>
            <div class="upload-box-status-text flex justify-center items-center pt-1 text-center" >
                <span>Bạn có thể <a href="" class="text-sky-400 direction_upload">tải từ máy tính</a> hoặc <a href="" class="text-sky-400">thêm địa chỉ ảnh</a>.</span>
            </div>
            </div>
        </div>

        <div class="ImgActive pb-7">
            <button onclick="Reload()" class="p-2 text-right uppercase absolute right-4 top-2 text-xs flex items-center"><i class="fa-solid fa-rotate-right pr-1" style="font-size:8px"></i> Reset</button>
            <div class="bodys flex justify-center items-center">
                <a href=""><i class="fa-regular fa-images text-sky-600 text-[120px]" style="font-size: 120px"></i></a>
            </div>
            <div class="footer flex justify-center items-center mt-2">
                <a href="" class="text-2xl color-[#333333]">Kéo thả hoặc paste (Ctrl + V) ảnh vào đây để upload</a>
        </div>
        <div class="upload-box-status-text flex justify-center items-center pt-1 text-center" >
            <span>Bạn có thể <a href="" class="text-sky-400 direction_upload">tải từ máy tính</a> hoặc <a href="" class="text-sky-400">thêm địa chỉ ảnh</a>.</span>
        </div>
            <div class="imgage_files flex justify-center items-center m-8">
            
            </div>
            <div class="input_files">
              
                <div class="flex justify-center items-center">
                <form action="">
                    <label for=""class="font-bold">Tự động xóa ảnh</label>
                    <br>
                    <select name="" id="" class="bg-gray-200 py-1.5 px-3 w-80 rounded-sm">
                        <option value="">Đừng tự động xóa</option>
                        <option value="">1 ngày</option>
                        <option value="">1 tuần</option>
                        <option value="">1 tháng</option>
                        <option value="">6 tháng</option>
                        <option value="">1 năm</option>
                    </select>
                </form>
                
            </div>
            <div class="btn-click flex justify-center items-center mt-4">
                <button class=" text-center uppercase py-3 rounded-sm text-white px-7" id="btn_uploadImage" style="background-color: #27AE61; letter-spacing: 2px">UPLOAD</button>
            </div>
               </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"></script>
    <script>
     
        
     const upload_img = document.querySelector('.upload_img');
        upload_img.addEventListener('click', function() {
            Reload();
        });
        function Reload() {
            document.querySelector('.py-24').style.display = 'block';
            document.querySelector('.ImgActive').style.display = 'none';
        }

        function toggleOffcanvas() {
    const offcanvas = document.getElementById('offcanvas');
    const homeCover = document.querySelector(".home_cover");
    if (offcanvas.classList.contains('-translate-y-full')) {
        offcanvas.classList.remove('-translate-y-full');
        const upload_img = document.querySelector('.upload_img');
        upload_img.classList.add('border-b-2', 'border-sky-600');
        changeBackground(true);
    } else {

        offcanvas.classList.add('-translate-y-full');
        document.querySelector('.upload_img').classList.remove('border-b-2', 'border-sky-600');
        changeBackground(false);
    }
}


function changeBackground(isOffcanvasOpen) {
    const homeCover = document.querySelector(".home_cover");
    const btn_upload = document.querySelector(".start_upload");
    
    if (isOffcanvasOpen) {
        homeCover.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
        btn_upload.style.display = "none";
    } else {
        homeCover.style.backgroundColor = "";
        btn_upload.style.display = "block";
    }
}

        document.querySelector(".upload").addEventListener("click", function() {
            toggleOffcanvas();
        });
        document.querySelector('.top-left').addEventListener('click', function(){
            let status = document.querySelector('ul').style.display;
            if(status === 'none' || status === '') {
                document.querySelector('ul').style.display = 'block';
            } else {
                document.querySelector('ul').style.display = 'none';
            }
        });

        document.querySelector('.check_language').addEventListener('click', function(){
            let status = document.querySelector('.show_language').style.display;
            if(status === 'none' || status === '') {
                document.querySelector('.show_language').style.display = 'grid';
            } else {
                document.querySelector('.show_language').style.display = 'none';
            }
        }); 

        document.getElementById('uploadLink').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('fileInput').click();
});
let file = null; 
document.getElementById('fileInput').addEventListener('change', function() {
    if (this.files.length > 0) {
        const imgContainer = document.querySelector('.imgage_files');
        document.querySelector('.py-24').style.display = 'none';
        document.querySelector('.ImgActive').style.display = 'block';

        Array.from(this.files).forEach(file => {
            if (file && file.type.startsWith('image/')) {
                const imgUrl = URL.createObjectURL(file);
                const wrapper = document.createElement('div');
                wrapper.classList.add('relative', 'inline-block', 'mr-4');

                const img = document.createElement('img');
                img.src = imgUrl;
                img.classList.add('w-28', 'h-28', 'object-cover');

                const closeDiv = document.createElement('div');
                closeDiv.classList.add('absolute', 'bg-white', 'rounded-full', 'p-1', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center');
                closeDiv.style.top = '-0.5rem';
                closeDiv.style.left = '-0.5rem';
                closeDiv.onclick = function() {
                    wrapper.remove();
                };
                closeDiv.style.boxShadow = '0 0 5px rgba(0, 0, 0, 0.3)';
                closeDiv.innerHTML = '<i class="fa-solid fa-x text-xs" style="font-size:0.6rem"></i>';

                const editDiv = document.createElement('div');
                editDiv.classList.add('absolute', 'top-8', 'left-1', 'bg-white', 'rounded-full', 'p-1', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center');
                editDiv.style.boxShadow = '0 0 5px rgba(0, 0, 0, 0.3)';
                editDiv.style.top = '1.2rem';
                editDiv.style.left = '-0.5rem';
                editDiv.innerHTML = '<i class="fa-solid fa-pen-to-square" style="font-size:0.7rem"></i>';

                wrapper.appendChild(img);
                wrapper.appendChild(closeDiv);
                wrapper.appendChild(editDiv);
                imgContainer.appendChild(wrapper);
            }
        });

        toggleOffcanvas();
    }
});


document.getElementById('btn_uploadImage').addEventListener('click', function() {
    const inputElement = document.getElementById('fileInput');
    if (inputElement.files.length > 0) {
        const formData = new FormData();

        Array.from(inputElement.files).forEach(file => {
            formData.append('images[]', file);
        });

        axios.post("/files-upload", formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            alert('Upload successfully!');
            window.location.href = '/showFile';
        }).catch(error => {
            alert('Upload failed!');
        });
    } else {
        console.log("No files selected!");
    }
});

    </script>
</body>
</html>
 