<div x-data="{ 
         show: false, 
         message: '', 
         timer: null,
         init() {
             @if (session('status'))
                 this.trigger('{{ session('status') }}');
             @endif
             @if (session('success'))
                 this.trigger('{{ session('success') }}');
             @endif
         },
         trigger(msg) {
             this.message = msg;
             this.show = true;
             if (this.timer) clearTimeout(this.timer);
             this.timer = setTimeout(() => { this.show = false }, 4000);
         }
     }"
     @show-banner.window="trigger($event.detail.message)"
     @toast.window="if ($event.detail.type === 'success') trigger($event.detail.message)"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 -translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-2"
     class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-bold flex items-center gap-2.5 shadow-sm"
     style="display: none;"
     id="success-banner">
     
     <div class="bg-emerald-500 text-white rounded-full p-1 shrink-0 flex items-center justify-center">
         <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
         </svg>
     </div>
     <span x-text="message" class="flex-1 text-xs sm:text-sm"></span>
     <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700 font-bold text-xs p-1">✕</button>
</div>
