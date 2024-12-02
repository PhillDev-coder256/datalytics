import requests
import pandas as pd
import plotly.graph_objects as go  # Use plotly.graph_objects instead of plotly.express

# API Endpoint
url = "https://statex.ipsos.co.ug/index.php/data_api/logs_data"

# Fetch data from the API
response = requests.get(url)

# Check for a successful response
if response.status_code == 200:
    data = response.json()
    df = pd.DataFrame(data)

    # Data Preprocessing
    df['date'] = pd.to_datetime(df['date'], format='%d-%m-%Y')
    df['time'] = pd.to_datetime(df['time'], format='%H:%M:%S').dt.time

    # Manually add region data (if needed)
    # ... (Same region assignment logic as before)

    # Create a table visualization using plotly.graph_objects
    fig_table = go.Figure(data=[go.Table(
        header=dict(values=list(df.columns),
                    fill_color='paleturquoise',
                    align='left'),
        cells=dict(values=[df[col] for col in df.columns],
                    fill_color='lavender',
                    align='left'))])

    fig_table.update_layout(title="API Data")
    fig_table.show()

else:
    print(f"Error fetching data: {response.status_code}")

fig_table = px.table(
    df, 
    title="API Data", 
    header_values=['Date', 'Day', 'Time', 'Duration', 'Commercial Name', 'Ad Type', 'Cost Net', 'Cost Gross', 'Comments', 'Position', 'Media', 'Brand', 'Company', 'Subsector', 'Sector'],
    header_styles={'font-size': '14px', 'font-weight': 'bold', 'background-color': '#f2f2f2'},
    cell_styles={'font-size': '12px', 'background-color': '#ffffff'}
)