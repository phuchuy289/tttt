document.querySelectorAll(".category").forEach((category) => {
  category.addEventListener("click", (e) => {
    e.preventDefault(); // Ngăn hành vi mặc định của button
    const selectedName = category.getAttribute("data-name");

    // Cập nhật trường ẩn
    document.getElementById("categoryInput").value = selectedName;

    // Highlight danh mục
    document.querySelectorAll(".category").forEach((c) => c.classList.remove("active"));
    category.classList.add("active");


    document.getElementById("categoryForm").submit();
  });
});