import './bootstrap';
import "./flatpickr";

import Alpine from 'alpinejs';
import collapse from "@alpinejs/collapse";
import * as Sentry from "@sentry/browser";
import Precognition from 'laravel-precognition-alpine';

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});

Alpine.plugin(Precognition);
Alpine.plugin(collapse);

window.Alpine = Alpine;

Alpine.start();
