<x-filament-panels::page>
    <x-filament-panels::form wire:submit="create">
        {{ $this->form }}

        <div class="fi-form-actions">
            <div class="flex flex-wrap items-center justify-start gap-3 fi-ac">
                <button x-bind:id="$id('key-bindings')"
                    x-mousetrap.global.mod-s="document.getElementById($el.id).click()" x-data="{
                    form: null,
                    isProcessing: false,
                    processingMessage: null,
                    }" x-init="
                        form = $el.closest('form')

                        form?.addEventListener('form-processing-started', (event) => {
                            isProcessing = true
                            processingMessage = event.detail.message
                        })

                        form?.addEventListener('form-processing-finished', () => {
                            isProcessing = false
                        })
                    " x-bind:class="{ 'enabled:opacity-70 enabled:cursor-wait': isProcessing }"
                    style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action"
                    type="submit" wire:loading.attr="disabled" x-bind:disabled="isProcessing" id="key-bindings-1">
                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-white transition duration-75 animate-spin fi-btn-icon"
                        wire:loading.delay.default="" wire:target="create">
                        <path clip-rule="evenodd"
                            d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                        <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor">
                        </path>
                    </svg>
                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-white transition duration-75 animate-spin fi-btn-icon" x-show="isProcessing"
                        style="display: none;">
                        <path clip-rule="evenodd"
                            d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                        <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor">
                        </path>
                    </svg>

                    <span x-show="! isProcessing" class="fi-btn-label">
                        Buat
                    </span>
                    <span x-show="isProcessing" x-text="processingMessage" class="fi-btn-label"
                        style="display: none;"></span>
                </button>

                <button style=";"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-gray-400 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-gray-300 dark:[input:checked+&amp;]:bg-gray-600 dark:[input:checked+&amp;]:hover:bg-gray-500 fi-ac-action fi-ac-btn-action"
                    type="button" wire:loading.attr="disabled" x-on:click="window.history.back()">
                    <span class="fi-btn-label">
                        Batal
                    </span>
                </button>
            </div>
        </div>
    </x-filament-panels::form>
</x-filament-panels::page>
