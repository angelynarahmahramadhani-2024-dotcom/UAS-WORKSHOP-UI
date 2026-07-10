<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-[#1E3A5F] hover:bg-[#F5A623] border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest active:bg-[#152841] focus:outline-none focus:ring-2 focus:ring-[#1E3A5F] focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-[#1E3A5F]/15 hover:shadow-lg']) }}>
    {{ $slot }}
</button>
