<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 dark:hover:bg-red-400 active:bg-red-700 dark:active:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 dark:focus:ring-offset-gray-800 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
