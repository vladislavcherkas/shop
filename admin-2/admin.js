class Main {}
class Admin {
    static async start() {
        App.killTimeout();
        Load.setProgress(100);
        await Screen.hide('.load');
        Load.pause();
        Screen.close('.load');
    }
}
Admin.start();