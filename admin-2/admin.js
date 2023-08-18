class Main {
    open() {

    }
}
class Admin {
    static async start() {
        Load.setProgress(100);
        await Load.hide();
        Load.pause();
        Load.close();
        Main.open();
    }
}
Admin.start();