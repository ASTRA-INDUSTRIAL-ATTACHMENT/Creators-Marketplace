<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creator Marketplace</title>
  <script src="https://cdn.jsdelivr.net/npm/react@18.2.0/umd/react.production.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/react-dom@18.2.0/umd/react-dom.production.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/@babel/standalone@7.22.5/babel.min.js"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-black text-white font-sans">
  <div id="root"></div>
  <script type="text/babel">
    function App() {
      return (
        <div className="min-h-screen flex flex-col">
          {/* Navigation Bar */}
          <nav className="bg-gray-900 bg-opacity-80 backdrop-blur-md fixed w-full top-0 z-10 shadow-lg">
            <div className="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
              <h1 className="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500">
                Creator Marketplace
              </h1>
              <ul className="flex space-x-6">
                <li><a href="#" className="text-gray-300 hover:text-cyan-400 transition">Home</a></li>
                <li><a href="#" className="text-gray-300 hover:text-cyan-400 transition">Campaigns</a></li>
                <li><a href="#" className="text-gray-300 hover:text-cyan-400 transition">Login</a></li>
                <li><a href="#" className="px-4 py-2 bg-cyan-500 text-black font-semibold rounded-full hover:bg-cyan-400 transition">Sign Up</a></li>
              </ul>
            </div>
          </nav>

          {/* Main Content */}
          <main className="flex-grow flex flex-col items-center justify-center p-4 mt-20">
            {/* Header */}
            <header className="text-center mb-12">
              <h1 className="text-5xl md:text-7xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500 animate-pulse">
                Creator Marketplace
              </h1>
              <p className="mt-4 text-xl md:text-2xl text-gray-300 opacity-80">
                Turn Your Influence into Income
              </p>
            </header>

            {/* Cards */}
            <div className="max-w-4xl mx-auto text-center">
              <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                {/* Card 1: Creators */}
                <div className="bg-gray-800 bg-opacity-50 p-6 rounded-xl hover:bg-opacity-70 transition-all duration-300 border border-cyan-500">
                  <h2 className="text-2xl font-semibold text-cyan-400">For Creators</h2>
                  <p className="mt-2 text-gray-400">
                    Showcase your vibe, apply to campaigns, and earn money from your passion.
                  </p>
                  <button className="mt-4 px-6 py-2 bg-cyan-500 text-black font-semibold rounded-full hover:bg-cyan-400 transition">
                    Join as Creator
                  </button>
                </div>

                {/* Card 2: Businesses */}
                <div className="bg-gray-800 bg-opacity-50 p-6 rounded-xl hover:bg-opacity-70 transition-all duration-300 border border-purple-500">
                  <h2 className="text-2xl font-semibold text-purple-400">For Businesses</h2>
                  <p className="mt-2 text-gray-400">
                    Launch ad campaigns and connect with micro-influencers to boost your brand.
                  </p>
                  <button className="mt-4 px-6 py-2 bg-purple-500 text-black font-semibold rounded-full hover:bg-purple-400 transition">
                    Post a Campaign
                  </button>
                </div>

                {/* Card 3: Earnings */}
                <div className="bg-gray-800 bg-opacity-50 p-6 rounded-xl hover:bg-opacity-70 transition-all duration-300 border border-green-500">
                  <h2 className="text-2xl font-semibold text-green-400">Earn Online</h2>
                  <p className="mt-2 text-gray-400">
                    Secure payments with escrow, transparent earnings, and fast payouts.
                  </p>
                  <button className="mt-4 px-6 py-2 bg-green-500 text-black font-semibold rounded-full hover:bg-green-400 transition">
                    Learn More
                  </button>
                </div>
              </div>
            </div>

            {/* CTA Section */}
            <section className="mt-16">
              <p className="text-lg text-gray-400 mb-4">Ready to monetize your influence or grow your brand?</p>
              <button className="px-8 py-3 bg-gradient-to-r from-cyan-500 to-purple-500 text-black font-semibold rounded-full hover:scale-105 transition-transform">
                Get Started Now
              </button>
            </section>
          </main>

          {/* Footer */}
          <footer className="bg-gray-900 bg-opacity-80 py-8">
            <div className="max-w-6xl mx-auto px-4 text-center">
              <div className="flex justify-center space-x-6 mb-4">
                <a href="#" className="text-gray-300 hover:text-cyan-400 transition">Twitter</a>
                <a href="#" className="text-gray-300 hover:text-cyan-400 transition">Instagram</a>
                <a href="#" className="text-gray-300 hover:text-cyan-400 transition">LinkedIn</a>
                <a href="#" className="text-gray-300 hover:text-cyan-400 transition">Contact Us</a>
              </div>
              <p className="text-gray-500 text-sm">&copy; 2025 Creator Marketplace. All rights reserved.</p>
            </div>
          </footer>
        </div>
      );
    }

    const root = ReactDOM.createRoot(document.getElementById('root'));
    root.render(<App />);
  </script>
</body>
</html>