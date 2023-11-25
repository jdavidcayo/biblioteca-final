<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-gotham-medium bg-fucsia rounded-full inline-flex items-end px-4 py-2 border border-transparent font-semibold text-xs text-crema uppercase tracking-widest hover:bg-morado focus:bg-morado active:bg-fucsia focus:outline-none focus:ring-1 focus:ring-rosado hover:ring-1 hover:ring-rosado transition ease-in-out duration-150']) }}>
        {{ $slot }}
</button>
