let data = {
  labels: ["January", "February", "March", "April", "May", "June", "July"],
  datasets: [
    {
      label: "Nghỉ làm",
      backgroundColor: "#FF5F00",
      data: [50, 40, 23, 45, 67, 78, 23],
      stack: 1,
    },
    {
      label: "Tổng số nhân viên",
      backgroundColor: "#FFBD00",
      data: [50, 40, 78, 23, 23, 45, 67],
      stack: 3,
    },
    {
      label: "Đi làm",
      backgroundColor: "#16C41E",
      data: [25, 10, 12, 20, 10, 12, 5],
      stack: 2,
    },
  ],
};

const options = {
  title: {
    display: true,
    text: "Transport Mode",
  },
  tooltips: {
    mode: "single",
  },
  responsive: true,
  scales: {},
  categoryPercentage: 0.5,
  barPercentage: 0.3,
  borderRadius: 100,
};

const ctx = document.getElementById("canvas").getContext("2d");
const myBar = new Chart(ctx, {
  type: "bar",
  options: options,
  data: data,
});
