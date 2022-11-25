<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shmeep</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">

            <div class="max-w-6xl mx-auto px-6">
                <div class="flex justify-center">
                    <svg  viewBox="0 0 313 99" fill="#FF6B00" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 h-20">
                        <path
                            fill="#FF6B00"
                            d="M45.274 36.947L56.2 50l-10.92 13.053A17.959 17.959 0 0136.035 68c-3.494.687-7.11.31-10.394-1.086a18.115 18.115 0 01-8.06-6.754A18.54 18.54 0 0114.559 50a18.54 18.54 0 013.025-10.159 18.115 18.115 0 018.06-6.754A17.788 17.788 0 0136.035 32a17.959 17.959 0 019.244 4.946h-.006zM60.5 44.853L50.104 32.42l-.092-.1a24.496 24.496 0 00-12.601-6.84 24.256 24.256 0 00-14.22 1.424 24.698 24.698 0 00-11.044 9.207A25.282 25.282 0 008 50c0 4.944 1.443 9.778 4.147 13.889a24.7 24.7 0 0011.045 9.207A24.256 24.256 0 0037.41 74.52a24.496 24.496 0 0012.601-6.84l.092-.1L60.5 55.147 70.896 67.58l.092.1a24.496 24.496 0 0012.601 6.84c4.774.964 9.723.469 14.22-1.424a24.7 24.7 0 0011.044-9.207A25.282 25.282 0 00113 50c0-4.944-1.443-9.778-4.147-13.889a24.7 24.7 0 00-11.045-9.207A24.256 24.256 0 0083.59 25.48a24.496 24.496 0 00-12.601 6.84l-.092.1L60.5 44.853zM64.805 50L75.72 36.947A17.959 17.959 0 0184.964 32a17.788 17.788 0 0110.394 1.086 18.114 18.114 0 018.059 6.754A18.541 18.541 0 01106.441 50c0 3.615-1.052 7.15-3.024 10.159a18.114 18.114 0 01-8.06 6.754A17.788 17.788 0 0184.965 68a17.959 17.959 0 01-9.244-4.946L64.805 50zM136.608 57.192c.704 0 1.28-.053 1.728-.16.469-.128.843-.288 1.12-.48a1.71 1.71 0 00.576-.736 2.56 2.56 0 00.16-.928c0-.725-.341-1.323-1.024-1.792-.683-.49-1.856-1.013-3.52-1.568a30.727 30.727 0 01-2.176-.864 8.717 8.717 0 01-1.952-1.248 6.243 6.243 0 01-1.408-1.824c-.363-.725-.544-1.6-.544-2.624s.192-1.941.576-2.752a5.872 5.872 0 011.632-2.112c.704-.576 1.557-1.013 2.56-1.312 1.003-.32 2.133-.48 3.392-.48 1.493 0 2.784.16 3.872.48 1.088.32 1.984.672 2.688 1.056l-1.44 3.936a12.444 12.444 0 00-2.08-.832c-.747-.256-1.653-.384-2.72-.384-1.195 0-2.059.17-2.592.512-.512.32-.768.821-.768 1.504 0 .405.096.747.288 1.024.192.277.459.533.8.768.363.213.768.416 1.216.608.469.17.981.352 1.536.544 1.152.427 2.155.853 3.008 1.28.853.405 1.557.885 2.112 1.44a5.178 5.178 0 011.28 1.952c.277.747.416 1.653.416 2.72 0 2.07-.725 3.68-2.176 4.832-1.451 1.13-3.637 1.696-6.56 1.696-.981 0-1.867-.064-2.656-.192a16.12 16.12 0 01-2.112-.416c-.597-.17-1.12-.352-1.568-.544a12.846 12.846 0 01-1.088-.544l1.408-3.968c.661.363 1.472.693 2.432.992.981.277 2.176.416 3.584.416zm25.953-18.368h4.992V61h-4.992v-9.408h-8.384V61h-4.992V38.824h4.992v8.48h8.384v-8.48zm16.012 0c.384.704.821 1.579 1.312 2.624a73.63 73.63 0 011.568 3.36 117.288 117.288 0 011.632 3.68l1.504 3.552 1.504-3.552a210.316 210.316 0 011.6-3.68 197.224 197.224 0 011.568-3.36c.512-1.045.96-1.92 1.344-2.624h4.544c.213 1.472.405 3.125.576 4.96.192 1.813.352 3.712.48 5.696.149 1.963.277 3.936.384 5.92.128 1.984.235 3.85.32 5.6h-4.864a569.135 569.135 0 00-.256-7.04 191.389 191.389 0 00-.48-7.68c-.384.896-.811 1.888-1.28 2.976l-1.408 3.264a284.2 284.2 0 01-1.312 3.136c-.427.981-.789 1.824-1.088 2.528h-3.488c-.299-.704-.661-1.547-1.088-2.528a775.288 775.288 0 00-1.344-3.136 216.137 216.137 0 00-1.376-3.264c-.469-1.088-.896-2.08-1.28-2.976a191.389 191.389 0 00-.48 7.68 569.135 569.135 0 00-.256 7.04h-4.864c.085-1.75.181-3.616.288-5.6l.384-5.92c.149-1.984.309-3.883.48-5.696.192-1.835.395-3.488.608-4.96h4.768zM201.404 61V38.824h14.976v4.192h-9.984v4.352h8.864v4.096h-8.864v5.344h10.72V61h-15.712zm19.406 0V38.824h14.976v4.192h-9.984v4.352h8.864v4.096h-8.864v5.344h10.72V61H220.81zm26.062-22.432c3.307 0 5.846.587 7.616 1.76 1.771 1.152 2.656 3.05 2.656 5.696 0 2.667-.896 4.597-2.688 5.792-1.792 1.173-4.352 1.76-7.68 1.76h-1.568V61h-4.992V39.144a28.243 28.243 0 013.456-.448 46.433 46.433 0 013.2-.128zm.32 4.256c-.362 0-.725.01-1.088.032-.341.021-.64.043-.896.064v6.4h1.568c1.728 0 3.03-.235 3.904-.704.875-.47 1.312-1.344 1.312-2.624 0-.619-.117-1.13-.352-1.536a2.31 2.31 0 00-.96-.96c-.405-.256-.906-.427-1.504-.512a11.313 11.313 0 00-1.984-.16zM260.81 61V38.824h14.976v4.192h-9.984v4.352h8.864v4.096h-8.864v5.344h10.72V61H260.81zm25.902-22.432c3.328 0 5.878.597 7.648 1.792 1.771 1.173 2.656 3.008 2.656 5.504 0 1.557-.362 2.827-1.088 3.808-.704.96-1.728 1.717-3.072 2.272.448.555.918 1.195 1.408 1.92.491.704.971 1.45 1.44 2.24.491.768.96 1.579 1.408 2.432A53.57 53.57 0 01298.36 61h-5.6c-.405-.725-.821-1.461-1.248-2.208a36.194 36.194 0 00-1.28-2.176 39.455 39.455 0 00-1.28-1.984 20.01 20.01 0 00-1.28-1.728h-2.464V61h-4.992V39.144a28.323 28.323 0 013.36-.448 43.774 43.774 0 013.136-.128zm.288 4.256c-.362 0-.693.01-.992.032-.277.021-.544.043-.8.064v6.016h1.408c1.878 0 3.222-.235 4.032-.704.811-.47 1.216-1.27 1.216-2.4 0-1.088-.416-1.856-1.248-2.304-.81-.47-2.016-.704-3.616-.704z"
                        ></path>
                    </svg>
                </div>

                <div class="flex flex-row justify-center gap-2 mt-4 bg-white dark:bg-gray-800 overflow-hidden">
                    @if (Route::has('login'))
                        <div class="px-6 py-4 flex flex-row gap-4 rounded-lg">
                            @auth
                                <a href="{{ url('/home') }}" class="text-[2em] text-gray-700 dark:text-gray-500 underline">🏡 Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-[2em] text-gray-700 dark:text-gray-500 underline">🌟Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-[2em] text-gray-700 dark:text-gray-500 underline">🚀Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
