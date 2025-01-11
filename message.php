<!doctype html>
<html class="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" type="text/css" href="css/message.css"/> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    // Inline Tailwind CSS configuration
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            customBlue: '#1E40AF',
          },
        },
      },
      darkMode: 'class', // Enable dark mode with the 'class' strategy
    };
  </script>
</head>
<body class="bg-[#FDFDFD] dark:bg-[#282828]">
<nav class="mx-auto max-w-full border-b-2 border-[#575757]">
  <div class="flex py-8 relative px-4 md:px-16 lg:px-28 xl:px-28">
    <div class="flex items-center">
      <img src="images/darlogostroke.png" alt="" class=" h-14 md:h-20 lg:h-20 xl:h-20">
      <h1 class="de text-lg md:text-xl lg:text-xl xl:text-xl text-[#3D4782] dark:text-white">DARYLL ESTEROZA</h1>
    </div>
    <div class="absolute right-0 mr-10 md:mr-20 lg:mr-36 xl:mr-36 top-1/2 transform -translate-y-1/2">
      <a href="landingpage.php"><i class="fa-solid fa-x text-xl text-[#3D4782] dark:text-white font-extrabold"></i></a>
      
    </div>
  </div>
</nav>
<div class="flex justify-center mt-10">
<img src="images/dadada.jpg" class=" rounded-full h-44 md:h-52 lg:h-52 xl:h-52  " alt="">
</div>

<div class="container mt-6 md:mt-10 lg:mt-10 xl:mt-10 mb-36">
    <div class=" columns-1">
      <h1 class="tit text-center text-xl md:text-2xl lg:text-3xl xl:text-3xl dark:text-white ">
      Want to discuss a startup collaboration? <br> I<span class=" font-serif">'</span>m most definitely game.
      </h1>
</div>
<div class=" text-center text-4xl mt-4 gap-4">
  <a href="https://www.facebook.com/profile.php?id=100086400400094" target="_blank"><i class="fa-brands fa-facebook text-[#0165E1]"></i></a>
   <a href="" target="_blank"><i class="fa-brands fa-x-twitter dark:text-[#ffffff]"></i></a>
    <a href="" target="_blank"><i class="fa-brands fa-github text-[#000000] dark:text-[#ffffff]"></i></a>
    <a href="mailto:esterozad@gmail.com" target="_blank"><i class="fa-brands fa-google text-[#DB4437]"></i></a>
    <a href="https://www.linkedin.com/in/daryll-esteroza-236bb9261/" target="_blank"><i class="fa-brands fa-linkedin text-[#0A66C2]"></i></a>

</div>
   <div class=" px-6 md:px-16 lg:px-16 xl:px-80 mt-10">
    <form action="https://formsubmit.co/esterozad@gmail.com" method="POST">
      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
      <div>
      <label for="" class="relative block">
  <input  
    name="name"
    type="text" 
    class="dark:text-white w-full px-4 py-2 text-lg outline-none border-2 border-gray-400 rounded hover:border-gray-600 duration-200 peer focus:border-[#3D4782] dark:focus:border-[#d1a0ff] bg-inherit"
    required>
  <span class="absolute left-0 top-3 text-[#434343] dark:text-white px-1 text-lg tracking-wide peer-focus:text-[#3D4782] dark:peer-focus:text-[#d1a0ff] pointer-events-none duration-200 peer-focus:text-sm peer-focus:-translate-y-5 bg-white dark:bg-[#282828] ml-2 peer-valid:text-sm peer-valid:-translate-y-5">
    Name
  </span>
</label>
        </div>
        <div>
        <label for="" class="relative block">
  <input
    name="email"
    type="text" 
    class="dark:text-white w-full px-4 py-2 text-lg outline-none border-2 border-gray-400 rounded hover:border-gray-600 duration-200 peer focus:border-[#3D4782] dark:focus:border-[#d1a0ff] bg-inherit"
    required>
  <span class="absolute left-0 top-3 text-[#434343] dark:text-white px-1 text-lg tracking-wide peer-focus:text-[#3D4782] dark:peer-focus:text-[#d1a0ff] pointer-events-none duration-200 peer-focus:text-sm peer-focus:-translate-y-5 bg-white dark:bg-[#282828] ml-2 peer-valid:text-sm peer-valid:-translate-y-5">
    Email
  </span>
</label>
        </div>
        <div>
        <label for="" class="relative block">
  <input
  name="address" 
    type="text" 
    class="dark:text-white w-full px-4 py-2 text-lg outline-none border-2 border-gray-400 rounded hover:border-gray-600 duration-200 peer focus:border-[#3D4782] dark:focus:border-[#d1a0ff] bg-inherit"
    required>
  <span class="absolute left-0 top-3 text-[#434343] dark:text-white px-1 text-lg tracking-wide peer-focus:text-[#3D4782] dark:peer-focus:text-[#d1a0ff] pointer-events-none duration-200 peer-focus:text-sm peer-focus:-translate-y-5 bg-white dark:bg-[#282828] ml-2 peer-valid:text-sm peer-valid:-translate-y-5">
    Address
  </span>
</label>
        </div>
        <div>
        <label for="" class="relative block">
  <input
    name="interest"
    type="text" 
    class="dark:text-white w-full px-4 py-2 text-lg outline-none border-2 border-gray-400 rounded hover:border-gray-600 duration-200 peer focus:border-[#3D4782] dark:focus:border-[#d1a0ff] bg-inherit"
    required>
  <span class="absolute left-0 top-3 text-[#434343] dark:text-white px-1 text-lg tracking-wide peer-focus:text-[#3D4782] dark:peer-focus:text-[#d1a0ff] pointer-events-none duration-200 peer-focus:text-sm peer-focus:-translate-y-5 bg-white dark:bg-[#282828] ml-2 peer-valid:text-sm peer-valid:-translate-y-5">
    Interest
  </span>
</label>
        </div>
      </div>
       <label >
        <textarea name="" id="message" class="dark:bg-transparent dark:text-white w-full border-2 h-52 border-gray-400 px-4 py-2 text-lg rounded-md placeholder-[#434343] dark:placeholder-[#ffffff] focus:border-[#3D4782] dark:focus:border-[#d1a0ff] focus:outline-none" placeholder="Additional Details"></textarea>
       </label>
       <div class="flex justify-center">
       <button class="dark:border-[#cd85f4] dark:text-[#cd85f4] dark:hover:bg-[#7A1CAC] dark:hover:border-[#7A1CAC] dark:hover:text-white  hover:bg-[#3D4782] hover:text-white border-2 border-[#3D4782] text-[#3D4782] px-20 py-4 text-xl mt-5 rounded-full ease-in-out duration-300"  type="submit">
        Submit
       </button>
       </div>
       
    </form>
   </div>
  </div>
  <script>
  // Apply the saved theme on page load
  document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  });
</script>


</body>
</html>