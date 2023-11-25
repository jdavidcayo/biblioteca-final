@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-rosado bg-opacity-30 focus:border-rosado focus:ring-rosado shadow-sm noBorder']) !!} >
