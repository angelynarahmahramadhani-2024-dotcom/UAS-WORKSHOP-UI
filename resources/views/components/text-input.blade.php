@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 transition-colors']) }}>
