import { notify } from "@kyvg/vue3-notification";

class popup {
    success(text: string = ''): void {
        notify({
            title: "Error!",
            text,
            type: 'success'
          });
    }

    warn(text: string = ''): void {
        notify({
            title: "Warning!",
            text,
            type: 'warn'
          });
    }

    error(text: string = ''): void {
        notify({
            title: "Error!",
            text,
            type: 'error'
          });
    }
}

export default new popup;
