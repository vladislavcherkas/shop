class Admin {
    static async start() {
        console.log('admin');
        Load.setProgress(100);
        await Load.hide();
        Load.pause();
        Load.close();
    }
}
Admin.start();