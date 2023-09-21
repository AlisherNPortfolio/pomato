import axios, { AxiosInstance } from "axios";
import { HttpResponseStatuses } from "./types/enum";
import TokenService from "./services/TokenService";
import popup from "./helpers/popup";

const apiClient: AxiosInstance = axios.create({
    baseURL: import.meta.env.VITE_BASE_URL,
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});

apiClient.interceptors.request.use((config: any) => {
    config.headers['Accept-Language'] = 'uz';

    const token: string|null = TokenService.getToken();

    if (token) {
        config.headers.Authorization = 'Bearer ' + token
    }

    return config;
}, error => Promise.reject(error));

apiClient.interceptors.response.use((response: any) => {
    const resData = response.data;
    if (!resData?.success && resData?.message && Object.keys(resData.message).length > 0) {
        Object.values(resData.message).forEach((value: unknown) => {
            if (typeof value === 'string') {
                popup.error(value as string);
            } else {
                (value as String[]).forEach((err: unknown) => {
                    popup.error(err as string);
                })
            }
        })
    }
    return Promise.resolve(response);
}, (error: any) => {
    if (error.response && error.response.status == HttpResponseStatuses.UNAUTHORIZED) {
        TokenService.removeAll();
        window.location.href = '/';
        popup.error('Unauthorized');
    } else {
        popup.error(error.message);
    }
    return Promise.reject(error);
});

export default apiClient;
