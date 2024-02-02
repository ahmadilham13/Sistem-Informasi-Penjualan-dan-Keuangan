
@props([
'rows' => 3, // Adjust the default number of rows as needed
'value' => ''
])

{{-- <textarea {{ $attributes->merge(['class' => 'mt-2 py-1 text-base border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300', 'rows' => $rows]) }}>
{{ $slot }}
</textarea> --}}
<div class="w-full text-black" x-data="textArea($refs.wysiwyg, @js($value ?? ''))">
  <input type="hidden" {{ $attributes }} :value="content">
  <div class="overflow-hidden border border-gray-200 rounded-md">
    <div class="flex w-full text-xl text-gray-600 border-b border-gray-200">
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('bold')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18">
          <path
            d="M8 11H12.5C13.8807 11 15 9.88071 15 8.5C15 7.11929 13.8807 6 12.5 6H8V11ZM18 15.5C18 17.9853 15.9853 20 13.5 20H6V4H12.5C14.9853 4 17 6.01472 17 8.5C17 9.70431 16.5269 10.7981 15.7564 11.6058C17.0979 12.3847 18 13.837 18 15.5ZM8 13V18H13.5C14.8807 18 16 16.8807 16 15.5C16 14.1193 14.8807 13 13.5 13H8Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('italic')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path d="M15 20H7V18H9.92661L12.0425 6H9V4H17V6H14.0734L11.9575 18H15V20Z"></path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('underline')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M8 3V12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12V3H18V12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12V3H8ZM4 20H20V22H4V20Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('formatBlock','P')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M12 6V21H10V16C6.68629 16 4 13.3137 4 10C4 6.68629 6.68629 4 10 4H20V6H17V21H15V6H12ZM10 6C7.79086 6 6 7.79086 6 10C6 12.2091 7.79086 14 10 14V6Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('formatBlock','H1')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M13 20H11V13H4V20H2V4H4V11H11V4H13V20ZM21.0005 8V20H19.0005L19 10.204L17 10.74V8.67L19.5005 8H21.0005Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('formatBlock','H2')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M4 4V11H11V4H13V20H11V13H4V20H2V4H4ZM18.5 8C20.5711 8 22.25 9.67893 22.25 11.75C22.25 12.6074 21.9623 13.3976 21.4781 14.0292L21.3302 14.2102L18.0343 18H22V20H15L14.9993 18.444L19.8207 12.8981C20.0881 12.5908 20.25 12.1893 20.25 11.75C20.25 10.7835 19.4665 10 18.5 10C17.5818 10 16.8288 10.7071 16.7558 11.6065L16.75 11.75H14.75C14.75 9.67893 16.4289 8 18.5 8Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('formatBlock','H3')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M22 8L21.9984 10L19.4934 12.883C21.0823 13.3184 22.25 14.7728 22.25 16.5C22.25 18.5711 20.5711 20.25 18.5 20.25C16.674 20.25 15.1528 18.9449 14.8184 17.2166L16.7821 16.8352C16.9384 17.6413 17.6481 18.25 18.5 18.25C19.4665 18.25 20.25 17.4665 20.25 16.5C20.25 15.5335 19.4665 14.75 18.5 14.75C18.214 14.75 17.944 14.8186 17.7056 14.9403L16.3992 13.3932L19.3484 10H15V8H22ZM4 4V11H11V4H13V20H11V13H4V20H2V4H4Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('insertUnorderedList')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M8 4H21V6H8V4ZM4.5 6.5C3.67157 6.5 3 5.82843 3 5C3 4.17157 3.67157 3.5 4.5 3.5C5.32843 3.5 6 4.17157 6 5C6 5.82843 5.32843 6.5 4.5 6.5ZM4.5 13.5C3.67157 13.5 3 12.8284 3 12C3 11.1716 3.67157 10.5 4.5 10.5C5.32843 10.5 6 11.1716 6 12C6 12.8284 5.32843 13.5 4.5 13.5ZM4.5 20.4C3.67157 20.4 3 19.7284 3 18.9C3 18.0716 3.67157 17.4 4.5 17.4C5.32843 17.4 6 18.0716 6 18.9C6 19.7284 5.32843 20.4 4.5 20.4ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 mr-1 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('insertOrderedList')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path
            d="M8 4H21V6H8V4ZM5 3V6H6V7H3V6H4V4H3V3H5ZM3 14V11.5H5V11H3V10H6V12.5H4V13H6V14H3ZM5 19.5H3V18.5H5V18H3V17H6V21H3V20H5V19.5ZM8 11H21V13H8V11ZM8 18H21V20H8V18Z">
          </path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-l border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('justifyLeft')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path d="M3 4H21V6H3V4ZM3 19H17V21H3V19ZM3 14H21V16H3V14ZM3 9H17V11H3V9Z"></path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('justifyCenter')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path d="M3 4H21V6H3V4ZM5 19H19V21H5V19ZM3 14H21V16H3V14ZM5 9H19V11H5V9Z"></path>
        </svg>
      </button>
      <button type="button"
        class="flex items-center justify-center w-10 h-10 border-r border-gray-200 outline-none focus:outline-none hover:text-indigo-500 active:bg-gray-50"
        @click="format('justifyRight')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path d="M3 4H21V6H3V4ZM7 19H21V21H7V19ZM3 14H21V16H3V14ZM7 9H21V11H7V9Z"></path>
        </svg>
      </button>
    </div>
    <div class="w-full">
      <iframe x-ref="wysiwyg" class="w-full overflow-y-auto h-96" x-model="content"></iframe>
    </div>
  </div>
</div>

@push('scripts')
    <script>
      document.addEventListener("alpine:init", () => {
      Alpine.data('textArea', (el, value) => ({
        wysiwyg: el,
        content: value,
        init() {
          // Add CSS
          this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
            *,
            ::after,
            ::before {
              box-sizing: border-box;
            }
          
            :root {
              tab-size: 4;
            }
          
            html {
              line-height: 1.15;
              text-size-adjust: 100%;
            }
          
            body {
              margin: 0px;
              padding: 1rem 0.5rem;
            }
          
            body {
              font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            }
          </style>`;

          // Make editable
          this.wysiwyg.contentDocument.designMode = "on";

          this.setContent(value);
          this.addInputListener();
        },
        format(cmd, param) {
          this.wysiwyg.contentDocument.execCommand(cmd, !1, param || null)
          this.content = this.wysiwyg.contentDocument.body.innerHTML
        },
        setContent(value) {
          this.wysiwyg.contentDocument.body.innerHTML = `${value}`;
          this.content = this.wysiwyg.contentDocument.body.innerHTML;
        },
        updateContent() {
          this.content = this.wysiwyg.contentDocument.body.innerHTML;
        },
        addInputListener() {
        // Add input event listener to update content in real-time
          this.wysiwyg.contentDocument.body.addEventListener('input', () => {
            this.updateContent();
          });
        }
        }));
      })
    </script>
@endpush