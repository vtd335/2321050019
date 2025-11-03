let danhSachPhim = [
    {
        id: 1,
        tenPhim: "Mưa đỏ",
        namPhatHanh: 2025,
        tuoi: 16,
        thoiLuong: 2,
        quocGia: "Việt Nam",
        poster: "/img/mua-do2-1122.jpeg",
        theLoai: "Phim Chiếu Rạp"
    },
    {
        id: 2,
        tenPhim: "Conan",
        namPhatHanh: 2023,
        tuoi: 10,
        thoiLuong: 1.5,
        quocGia: "Nhật Bản",
        poster: "/img/mua-do2-1122.jpeg",
        theLoai: "Phim Chiếu Rạp"
    }
];

let phimHienTai =danhSachPhim[0];
let banner = document.getElementsByClassName('banner')[0];
function chonPhim(idPhim){
    for (let i = 0; <danhSachPhim.length; i++){
        if (danhSachPhim[i].id == idPhim){
            banner.computedStyleMap.backgroundImage = danhSachPhim[index].poster;
        }
    }
    debugger
}