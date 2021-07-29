<head>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

   <div class="md:relative mx-auto lg:px-6">
      <ul class="list-reset flex flex-row md:flex-col text-center md:text-left mt-5">
         <li class="mr-3 flex-1">
            <a href="{{route('home')}}"
               class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
               <i class="fas fa-link pr-0  md:pr-3"></i><span
                  class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Home</span>
            </a>
         </li>
         <li class="mr-3 flex-1">
            <a href="/explore"
               class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
               <i class="fas fa-link pr-0  md:pr-3"></i><span
                  class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Explore</span>
            </a>
         </li>
         <li class="mr-3 flex-1">
            <a href="#"
               class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
               <i class="fas fa-link pr-0  md:pr-3"></i><span
                  class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Messages</span>
            </a>
         </li>
         <li class="mr-3 flex-1">
            <a href="#"
               class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
               <i class="fas fa-link pr-0  md:pr-3"></i><span
                  class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Notifications</span>
            </a>
         </li>
         <li class="mr-3 flex-1">
            <a href="{{route('profile',auth()->user())}}"
               class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
               <i class="fas fa-link pr-0  md:pr-3"></i><span
                  class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Profile</span>
            </a>
         </li>
         <li class="mr-3 flex-1">
            <form action="/logout" method="POST">
               @csrf
               <button
                  class="block py-1 md:py-3 pl-1 align-middle text-gray-800 no-underline hover:text-pink-500 border-b-2 border-gray-800 md:border-gray-900 hover:border-pink-500">
                  <i class="fas fa-link pr-0  md:pr-3"></i><span
                     class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Logout</span>
               </button>
            </form>
         </li>

      </ul>
   </div>
</body>