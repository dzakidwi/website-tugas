import './bootstrap';

// Import Axios
import axios from 'axios';
window.axios = axios;

// Global functions
window.formatRupiah = (num) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(num);
};