import { Inter } from "next/font/google";

import "./styles/style.module.css";
import "./styles/datatables.min.css";
import "./styles/ti.css";
import "./styles/loader-0.module.css";
import "./styles/vendor.bundle.css";
import "./styles/fa.module.css";

const inter = Inter({ subsets: ["latin"] });

// export const metadata: Metadata = {
//   title: "Create Next App",
//   description: "Generated by create next app",
// };

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className={inter.className}>
      {children}
      </body>
    </html>
  );
}
