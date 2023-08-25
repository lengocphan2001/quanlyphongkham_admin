document.querySelector('.search-content-group-input').addEventListener('click', () => {
    document.querySelector('.search-content').classList.add('border_form')
})
document.querySelector('.app').addEventListener('click', () => {
    document.querySelector('.search-content').classList.remove('border_form')
})
document.querySelector('.search-content-group-input').addEventListener('click', (e) => {
   e.stopPropagation()
})

// Biểu đồ 1
var xValues = ["HDXD12", "HDXD36", "HDKXDTH", "HDTV", "HDDV", "HDXD24", "PLHD"];
var yValues = [37, 20, 19, 12, 8, 3, 0];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#2g7145",
  "#7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Nhân Sự Theo Loại Hợp Đồng"
    }
  }
});

// Biểu đồ 2
var xValues = ["Chưa cập nhật", "Đại học", "THPT", "Cao Đẳng", "Trung cấp"];
var yValues = [38, 25, 17, 11, 4];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart1", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Nhân Sự Theo Trình Độ"
    }
  }
});

// Biểu đồ 3
var xValues = ["20-25", "26-30", "31-45", "46-50", "51-55"];
var yValues = [23, 28, 44, 3, 2];
var barColors = ["#b91d47", "#00aba9","#2b5797","#e8c3b9","#1e7145"];

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Nhân Sự Theo Độ Tuổi"
    }
  }
});

// Biểu đồ 4
var xValues = ["Dưới 01 năm", "Từ 01-03 năm", "Trên 05 năm", "Từ 03-05 năm", "Trên 05 năm"];
var yValues = [35, 32, 20, 12, 1];
var barColors = ["#b91d47", "#00aba9","#2b5797","#e8c3b9","#1e7145"];

new Chart("myChart3", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Nhân Sự Theo Thâm Niên"
    }
  }
});

// Sử lý header
let btns = document.querySelectorAll('.header-tem-link')
let subs = document.querySelectorAll('.header-item-khoi')
console.log(btns)
btns.forEach(function(btn, index){
    btn.addEventListener('click', (e) => {
        e.preventDefault()
        e.stopPropagation()
    })
    btn.onclick = function() {
        document.querySelector('.header-tem-link.color-click').classList.remove('color-click')
        document.querySelector('.header-item-khoi.display-flex').classList.remove('display-flex')
        btn.classList.add('color-click')
        subs[index].classList.add('display-flex')
    }
})
document.querySelector('body').addEventListener('click', () => {
    document.querySelector('.header-tem-link.color-click').classList.remove('color-click')
    document.querySelector('.header-item-khoi.display-flex').classList.remove('display-flex')
    btns[0].classList.add('color-click')
    subs[0].classList.add('display-flex')
})
